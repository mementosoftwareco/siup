<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\ProcesoAdmision;
use App\UbicacionesGeograficas;
use App\RefsPersonalFamiliar;
use App\Educaciones;
use App\Homologacion;
use App\InscripcionPregrado;
use App\EstadosProcesoAdmisionEnum;
use App\HistoricosProcesoAdmision;
use App\Departamento;
use App\Municipio;
use App\CentroPoblado;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Auth;
use Mail;
use Response;
use Illuminate\Support\Facades\Input;

class LiderComercialController extends Controller
{
	
	/**
     * Create a new controller instance.
     *
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	
	public function listProcesos(Request $request)
    {
		$idEstadoProceso = EstadosProcesoAdmisionEnum::Inscrito;
		$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		
        return view('lidercomercial.list', [
            'procesosAdmon' => $procesosAdmon, 
        ]);
		
    }
	
	
	public function buscarAspirante(Request $request)
    {
		$identificacion = Input::get('identificacion');
		if($identificacion != null && strlen($identificacion) > 0){
			$procesosAdmon = ProcesoAdmision::where('id_persona', '=', $identificacion)->get();
		}else{
			$idEstadoProceso = EstadosProcesoAdmisionEnum::Inscrito;
			$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		}	
        return view('lidercomercial.list', [
            'procesosAdmon' => $procesosAdmon, 
        ]);
		
    }
	
	
	
	public function aprobarProceso(Request $request)
    {
		
		$idProcesoAdmision = $request->idProceso;
		//echo $idProcesoAdmision;
		$comentarios = $request->comentariosAprobacion;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::ValidadoLiderComercial, $comentarios, $idProcesoAdmision);
		
		
		$historicos = HistoricosProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmision)->get();
		$validadoFacultad = false;
		for( $i=0; $i<sizeof($historicos); $i++){
			if($historicos[$i]->id_estado == EstadosProcesoAdmisionEnum::ValidadoFacultad){
				$validadoFacultad = true;
			}
		}
		
		//buscar el proceso por id
		$procesoAdmon = ProcesoAdmision::findOrFail($idProcesoAdmision);
		
		if($validadoFacultad == true){
			HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::Validado, 'Estudiante con validación comercial y de facultad', $idProcesoAdmision);
			$procesoAdmon ->id_estado = EstadosProcesoAdmisionEnum::Validado;
			$procesoAdmon->save();
			
		}


		
        return redirect('/lc.inscripcion.list');
		
    }
	
	public function rechazarProceso(Request $request)
    {
		
		$idProcesoAdmision = $request->idProcesoR;
		$comentarios = $request->comentariosRechazo;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::RechazadoPorDocumentos, $comentarios, $idProcesoAdmision);
		
				
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmision)->get()->first();
		$procesoAdmon->id_estado=EstadosProcesoAdmisionEnum::PreInscrito;
		$procesoAdmon->save();
		
        return redirect('/lc.inscripcion.list');
		
    }
	
}
