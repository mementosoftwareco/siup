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
use App\Entrevista;
use App\EntrevistaViewModel;
use App\DetalleEntrevista;
use App\Pregunta;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Auth;

class AdmisionesController extends Controller
{
	
	/**
     * Create a new controller instance.

     *
     * 
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
	
	public function listarAspirantes(Request $request)
    {
		$idEstadoProceso = EstadosProcesoAdmisionEnum::Validado;
		$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		
        return view('admision.list', [
            'procesosAdmon' => $procesosAdmon,
        ]);
		
		
		
    }
	
	

	
	 public function admitirAspirante(Request $request,  $idProcesoAdmon)
    {
		$comentarios = $request->comentariosAprobacion;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::Admitido, $comentarios, $idProcesoAdmon);
		
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmon)->get()->first();	
		$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::Admitido;	
		$procesoAdmon->save();
		
		return redirect('/listarAspirantes');
			
		
    }
	
	
	
	 public function rechazarAspirante(Request $request,  $idProcesoAdmon)
    {
		$comentarios = $request->comentariosAprobacion;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::RechazadoPorAdmision, $comentarios, $idProcesoAdmon);
		
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmon)->get()->first();	
		$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::Inscrito;	
		$procesoAdmon->save();
		
		return redirect('/listarAspirantes');
			
		
    }
	
	
	
	
}
