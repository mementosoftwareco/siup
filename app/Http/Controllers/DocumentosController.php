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
		$proceso = ProcesoAdmision::find($idProceso);
        $documentosRequeridos = DocumentoTipoProceso::where('id_tipo_proceso', '=',$proceso->tipoProcesoAdmision->id_tipo_proceso)->get();		
		$documentosCargados = Documento::where('id_proceso_admon', '=',$idProceso)->get();		
				
		for ($i = 0; $i < sizeof($documentosRequeridos); $i++) {
			if(sizeof($documentosCargados) > 0){
			
				for($j =0; $j < sizeof($documentosCargados); $j++){			
			
					if($documentosRequeridos[$i] -> id == $documentosCargados[$j] -> id_documento_tipo_proceso){
						$documentosRequeridos[$i] -> documento = $documentosCargados[$j];
						$documentosRequeridos[$i] -> documento->estado = 'Cargado';				
					}					
		        }
			} else{
				$documentosRequeridos[$i] -> documento = new Documento;
				$documentosRequeridos[$i] -> documento->estado = 'Pendiente';
			}
			
		}

		return View::make('documentos.index')->with('documentosRequeridos', $documentosRequeridos)->with('idProceso', $proceso->id_proceso_admon);
	}	
	
	public function mostrarDocumento($id)
	{
		
		$documento = Documento::where('id_documento', '=',$id)->get()->first();	
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
		
		
		$historico = new HistoricosProcesoAdmision;	
		if (Auth::user() != null){
			$historico->id_usuario = Auth::user()->id;	
		} else{
			$historico->id_usuario = null;
		}
			
		$historico->id_estado = EstadosProcesoAdmisionEnum::PreInscrito;
		$historico->comentarios = 'Carga de Documentos';
		$historico->fecha = Carbon::now();
		$historico->id_proceso_admon = $idProceso;
		$historico->save();

		return $this->prepararCargaDocumentos($idProceso)	;
		
	}
	
	
	
	public function actualizarPerfil($id)
	{
		$rules = array(
        'nombre'       => 'required',
        'descripcion'      => 'required'
		);
		// store
		$perfil = Perfil::find($id);
		$perfil->nombre = Input::get('nombre');
		$perfil->descripcion = Input::get('descripcion');
		$perfil->save();
	
	
		return Redirect::to('nuevoPerfil');
	}
	
	
	public function eliminarPerfil($id)
	{
		
		// store
		$perfil = Perfil::find($id);
		
		$perfil->delete();
	
	
		return Redirect::to('nuevoPerfil');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/perfiles/create.blade.php)
		return View::make('perfiles.create');
	}
	
	
		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function guardarPerfil()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'nombre'       => 'required',
			'descripcion'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('perfiles/create')
				->withErrors($validator);
				
		} else {
			// store
			$perfil = new Perfil;
			$perfil->nombre       = Input::get('nombre');
			$perfil->descripcion      = Input::get('descripcion');	
			$perfil->save();

			// redirect
			Session::flash('message', 'Perfil creado correctamente');
			return Redirect::to('nuevoPerfil');
		}
	}
	
	
	
	
}
