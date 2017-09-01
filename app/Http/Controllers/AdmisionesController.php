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
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::Admitido, 'Aspirante admitido', $idProcesoAdmon);
		
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmon)->get()->first();	
		$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::Admitido;	
		$procesoAdmon->save();
		
		$idEstadoProceso = EstadosProcesoAdmisionEnum::PendienteValidacionAdmision;
		$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		
        return view('entrevista.list', [
            'procesosAdmon' => $procesosAdmon,
        ]);
			
		
    }
	
	
	
	
	/**
     * Create a preinscripcion.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, ProcesoAdmision $procesoAdmon)
    {
        
		$this->validate($request, [
            'aceptaComunicacion' => 'required|max:10',
			'aceptaPoliticasPriv' => 'required|max:50',
			'pregunta1' => 'required|max:10',
			'pregunta2' => 'required|max:10',
			'pregunta3' => 'required|max:10',
			'pregunta4' => 'required|max:10',
			'pregunta5' => 'required|max:10',
			'pregunta6' => 'required|max:10',
			'pregunta7' => 'required|max:10',
			'pregunta8' => 'required|max:10',
			'pregunta9' => 'required|max:10',
			'pregunta10' => 'required|max:10',
			'pregunta11' => 'required|max:10',
			'pregunta12' => 'required|max:10',
			'pregunta13' => 'required|max:10',
			'pregunta14' => 'required|max:10',
			'pregunta15' => 'required|max:10',
			'pregunta16' => 'required|max:10',
			'pregunta17' => 'required|max:10',
			'pregunta18' => 'required|max:10',
			'pregunta19' => 'required|max:10',
			'pregunta20' => 'required|max:10',
			'pregunta21' => 'required|max:10',
			'pregunta22' => 'required|max:10',
			'pregunta23' => 'required|max:10',
			'pregunta24' => 'required|max:10',
			'pregunta25' => 'required|max:10',
			'pregunta26' => 'required|max:10',
			'pregunta27' => 'required|max:10',
			'pregunta28' => 'required|max:10',
			'pregunta29' => 'required|max:10',
			'pregunta30' => 'required|max:10',
			'pregunta31' => 'required|max:10',
			'pregunta32' => 'required|max:10',
			'pregunta33' => 'required|max:10',
			'pregunta34' => 'required|max:10',
			'pregunta35' => 'required|max:10',
			'pregunta36' => 'required|max:10',
        ]);

		$idProcesoAdmision = $procesoAdmon->id_proceso_admon;
		$entrevista = Entrevista::where('id_proceso_admon', '=', $idProcesoAdmision)->first();
		
		if($entrevista == null){
			$entrevista = new Entrevista;
			$entrevista->fecha_entrevista = Carbon::now();	
			$entrevista->id_proceso_admon = $idProcesoAdmision;		
		}
		$entrevista->acepta_comunicacion = $request->aceptaComunicacion;
		$entrevista->acepta_politicas_priv = $request->aceptaPoliticasPriv;
		
		$entrevista->save();
		
		$idEntrevista = $entrevista->id_entrevista;
		
		for ($i = 1; $i <= 36; $i++) {
			$this->guardarDetalleEntrevista($idEntrevista, $i, 'pregunta'.(string)$i, $request);
		}
		
		$historicoProcesos = new HistoricosProcesoAdmision;
		//$historicoProcesos->id_usuario = Auth::user()->id;
		$historicoProcesos->id_estado = EstadosProcesoAdmisionEnum::PendienteValidacionEntrevista;
		$historicoProcesos->id_proceso_admon = $procesoAdmon->id_proceso_admon;
		$historicoProcesos->comentarios = "Formulario de entrevista diligenciado por el Estudiante";
		$historicoProcesos->fecha = Carbon::now();
		
		$historicoProcesos->save();
		
		$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::PendienteValidacionEntrevista;
        $procesoAdmon->save();
		
        return redirect('/');
    }
	
	private function guardarDetalleEntrevista($idEntrevista, $idPregunta, $nombreCampo, Request $request){
		$detalleEntrevista = DetalleEntrevista::where('id_entrevista', '=', $idEntrevista)->where('id_pregunta', $idPregunta)->first();
		if($detalleEntrevista == null){
			$detalleEntrevista = new DetalleEntrevista;
			$detalleEntrevista->id_entrevista = $idEntrevista;
			$detalleEntrevista->id_pregunta = $idPregunta;
		}
		$detalleEntrevista->texto_respuesta = $request->input($nombreCampo);
		$detalleEntrevista->save();
	}
}
