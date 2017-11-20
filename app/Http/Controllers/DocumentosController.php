<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;

use App\ProcesoAdmision;
use App\Documento;
use App\DocumentoTipoProceso;
use App\TipoDocumento;
use App\Persona;
use App\Inscripcion;
use File;


use View;
use Validator;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\HistoricosProcesoAdmision;
use Auth;
use App\EstadosProcesoAdmisionEnum;
use Illuminate\Contracts\Encryption\DecryptException;


class DocumentosController extends Controller
{
    public function nuevoPerfil()
	{
		// get all the perfiles
		$perfiles = Perfil::all();		
		return View::make('perfiles.index')
			->with('perfiles', $perfiles);
	}
	
	public function editarPerfil($id)
	{
		// get all the perfiles
		$perfil = Perfil::find($id);		
		return View::make('perfiles.edit')
			->with('perfil', $perfil);
	}
	
	public function prepararCargaDocumentosP($idProcesoCiphered)
	{
		try {
			$idProceso = decrypt($idProcesoCiphered);
		} catch (DecryptException $e) {
			return redirect('/');
		}

		return $this->prepararCargaDocumentosBackEnd($idProceso);
	}	
	
	public function prepararCargaDocumentos($idProceso)
	{
		$this->middleware('auth');
		return $this->prepararCargaDocumentosBackEnd($idProceso);
	}

	public function prepararCargaDocumentosBackEnd($idProceso){
		
		$user = new User;
		$perfil = $user->obtenerNombrePerfil();

		if ( $perfil === 'Operador' || $perfil === 'Call Center' || $perfil === 'Comercial'){
         $edicion=false;
		 $breadcrumb='cargaDocumentos';
	 	}
		if ( $perfil === 'Líder Comercial' ){
         $edicion=true;
		 $breadcrumb='validacionCargaDocumentos';
		}
		
		
		
		
		
		$proceso = ProcesoAdmision::find($idProceso);
		if($proceso == null){
			return  redirect('/');
		}
		
        $documentosRequeridos = DocumentoTipoProceso::where('id_tipo_proceso', '=',$proceso->tipoProcesoAdmision->id_tipo_proceso)->get();		
		$documentosCargados = Documento::where('id_proceso_admon', '=',$idProceso)->get();		
				
		for ($i = 0; $i < sizeof($documentosRequeridos); $i++) {
			if(sizeof($documentosCargados) > 0){
				$documentFound = false;
				for($j =0; $j < sizeof($documentosCargados); $j++){			
			
					if($documentosRequeridos[$i] -> id == $documentosCargados[$j] -> id_documento_tipo_proceso){
						$documentosRequeridos[$i] -> documento = $documentosCargados[$j];
						$documentosRequeridos[$i] -> documento->estado = 'Cargado';
						$documentFound = true;
					}					
		        }
				if(!$documentFound){
					$documentosRequeridos[$i] -> documento = new Documento;
					$documentosRequeridos[$i] -> documento->estado = 'Pendiente';
				}
			} else{
				$documentosRequeridos[$i] -> documento = new Documento;
				$documentosRequeridos[$i] -> documento->estado = 'Pendiente';
			}
			
		}
		
		$persona = Persona::findOrFail($proceso -> id_persona);		
		$inscripcion =Inscripcion::findOrFail($proceso -> id_inscripcion);

		return View::make('documentos.index')->with('documentosRequeridos', $documentosRequeridos)->with('idProceso', $proceso->id_proceso_admon)
			->with('persona', $persona)->with('inscripcion', $inscripcion), ->with('breadcrumb', $breadcrumb)->with('edicion', $edicion);
	}	
	
	public function mostrarDocumento($idCiphered)
	{
		
		try {
			$id = decrypt($idCiphered);
		} catch (DecryptException $e) {
			return redirect('/');
		}
		
		$documento = Documento::where('id_documento', '=',$id)->get()->first();
		
		if($documento == null){
			return  redirect('/');
		}
		
        $ruta = $documento->ubicacion.$documento->nombre;		
		$archivo = Storage::disk('ftp')->get($ruta);	
		//Storage::disk('local')->put($ruta, $archivo);
		
		
		return response()->make($archivo, 200, [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="'.$documento->nombre.'"'
		]);
		
		
	}
	
	
	public function cargarDocumentos(Request $request)
	{
		$idProceso = Input::get('idProceso');			
		//echo 'idProceso'.($idProceso);		
		$proceso = ProcesoAdmision::find($idProceso);
        $documentosRequeridos = DocumentoTipoProceso::where('id_tipo_proceso', '=',$proceso->tipoProcesoAdmision->id_tipo_proceso)->get();	


		$ids =[];
		for ($i = 0; $i < sizeof($documentosRequeridos); $i++) {			
			$ids[$i] = $documentosRequeridos[$i] -> id;
			//echo 'id'.$ids[$i];		
		}
		
		//echo 'identificadores'.sizeof($ids);
		
		$directory = $proceso->id_persona;
		 
		Storage::makeDirectory($directory);

		for ($i = 0; $i < sizeof($ids); $i++) {
			if ($request->file('file'.$ids[$i])) {
				//echo 'encontró archivo para '.$ids[$i];
				$file = $request->file('file'.$ids[$i]);
				$documentoRequerido = DocumentoTipoProceso::where('id', '=',$ids[$i])->get()->first();	
				//echo 'doc'.$ids[$i].$documentoRequerido->id.$documentoRequerido->id_tipo_documento;
				//echo 'nombre para guardar '.$documentoRequerido->tipoDocumento->nombre_almacenamiento;
				$path = Storage::put('/'.$directory.'/'.$documentoRequerido->tipoDocumento->nombre_almacenamiento, File::get($file->getRealPath()));
				if($documentoRequerido->documento == null){
					$documentoRequerido->documento = new Documento;	
				}
				$documentoRequerido->documento->id_proceso_admon = $proceso->id_proceso_admon;
				$documentoRequerido->documento->id_documento_tipo_proceso = $documentoRequerido->id;
				$documentoRequerido->documento->nombre = $documentoRequerido->tipoDocumento->nombre_almacenamiento;
				$documentoRequerido->documento->ubicacion = '/'.$directory.'/';
				$documentoRequerido->documento->fecha_creacion = Carbon::now()->format('d-m-Y');
				$documentoRequerido->documento->save();
			}  

		} 
		
		
		
		
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::PreInscritoDocumentos, 'Carga de Documentos', $proceso->id_proceso_admon);

		return $this->prepararCargaDocumentos($idProceso)	;
		
	}
	
	
	

	
}
