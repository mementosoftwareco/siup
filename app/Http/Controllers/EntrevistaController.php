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
use App\SiupProgramas;
use App\VParametros;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Auth;

class EntrevistaController extends Controller
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
    
	
	public function listarEntrevistas(Request $request)
    {
		$idEstadoProceso = EstadosProcesoAdmisionEnum::Inscrito;
		$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		$procesos = array();
		
		for($i=0; $i<sizeof($procesosAdmon); $i++){
			$procesoAdmon = $procesosAdmon[$i];
			$historicos = HistoricosProcesoAdmision::where('id_proceso_admon', '=', $procesoAdmon->id_proceso_admon)->get();
			$pendienteValidacionEntrevista = false;
			$validadoFacultad = false;
			for( $j=0; $j<sizeof($historicos); $j++){
				if($historicos[$j]->id_estado == EstadosProcesoAdmisionEnum::PendienteValidacionEntrevista){
					$pendienteValidacionEntrevista = true;
				}
				if($historicos[$j]->id_estado == EstadosProcesoAdmisionEnum::ValidadoFacultad){
					$validadoFacultad = true;
				}
			}
			
			if($pendienteValidacionEntrevista == true && $validadoFacultad != true){
				array_push($procesos, $procesoAdmon);
			}
		}
		
		
		
        return view('entrevista.list', [
            'procesosAdmon' => $procesos,
        ]);
		
    }
	
	public function indexCiphered(Request $request, $IdProcesoAdmon)
    {
		try {
			$idProcesoAdmision = decrypt($IdProcesoAdmon);
		} catch (DecryptException $e) {
			return redirect('/');
		}
		return $this->index($request, $idProcesoAdmision);
	}
		
	
	//
	/**
     * Display the Entrevista page
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request, $idProcesoAdmision)
    {
		
		$procesoAdmon = ProcesoAdmision::findOrFail($idProcesoAdmision);
		$entrevistaViewModel = new EntrevistaViewModel;
		$idInscripcion = $procesoAdmon -> id_inscripcion;
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$persona = Persona::findOrFail($procesoAdmon -> id_persona);
		
		$entrevistaViewModel->idProcesoAdmision = $procesoAdmon->id_proceso_admon;
		$entrevistaViewModel->nombres = $persona->nombres;
		$entrevistaViewModel->apellidos = $persona->apellidos;
		$entrevistaViewModel->tipoIdentificacion = $persona->id_tipo_identificacion;
		$entrevistaViewModel->numeroIdentificacion = $persona->id_persona;
		
		
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$entrevistaViewModel->modalidad = $inscripcion->id_modalidad;
		$entrevistaViewModel->programa = $inscripcion->id_programa;
						
		$entrevista = Entrevista::where('id_proceso_admon', '=', $idProcesoAdmision)->first();
		
		if($entrevista != null){
			$entrevistaViewModel->idEntrevista = $entrevista->id_entrevista;
			$entrevistaViewModel->fechaEntrevista = $entrevista->fecha_entrevista;
			$entrevistaViewModel->aceptaComunicacion = $entrevista->acepta_comunicacion;
			$entrevistaViewModel->aceptaPoliticasPriv = $entrevista->acepta_politicas_priv;
		
			for ($i = 1; $i <= 36; $i++) {
				$detalleEntrevista = DetalleEntrevista::where('id_entrevista', '=', $entrevista->id_entrevista)->where('id_pregunta', $i)->first();
				if($detalleEntrevista != null){
					$nombreCampo = 'pregunta'.(string)$i;
					$entrevistaViewModel->$nombreCampo = $detalleEntrevista->texto_respuesta;
				}
			}
		
		}
		
		$progs = SiupProgramas::where('activo', '=', 'Y')->orderBy('desc_programa')->pluck('desc_programa', 'cod_programa');
		$tiposDocId = VParametros::where('tabla', '=', 'TIPO_DE_IDENTIFICACION')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		
		return View::make('entrevista.index')->with(compact('entrevistaViewModel','progs','tiposDocId'));
        
    }
	
	
	
	 public function evaluarEntrevista(Request $request, ProcesoAdmision $procesoAdmon)
    {
		$idProcesoAdmision = $procesoAdmon->id_proceso_admon;
		$entrevistaViewModel = new EntrevistaViewModel;
		$idInscripcion = $procesoAdmon -> id_inscripcion;
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$persona = Persona::findOrFail($procesoAdmon -> id_persona);
		
		$entrevistaViewModel->idProcesoAdmision = $procesoAdmon->id_proceso_admon;
		$entrevistaViewModel->nombres = $persona->nombres;
		$entrevistaViewModel->apellidos = $persona->apellidos;
		$entrevistaViewModel->tipoIdentificacion = $persona->id_tipo_identificacion;
		$entrevistaViewModel->numeroIdentificacion = $persona->id_persona;
		
		
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$entrevistaViewModel->modalidad = $inscripcion->id_modalidad;
		$entrevistaViewModel->programa = $inscripcion->nombre_programa;
						
		$entrevista = Entrevista::where('id_proceso_admon', '=', $idProcesoAdmision)->first();
		
		if($entrevista != null){
			$entrevistaViewModel->idEntrevista = $entrevista->id_entrevista;
			$entrevistaViewModel->fechaEntrevista = $entrevista->fecha_entrevista;
			$entrevistaViewModel->aceptaComunicacion = $entrevista->acepta_comunicacion;
			$entrevistaViewModel->aceptaPoliticasPriv = $entrevista->acepta_politicas_priv;
		
			for ($i = 1; $i <= 36; $i++) {			
				$detalleEntrevista = DetalleEntrevista::where('id_entrevista', '=', $entrevista->id_entrevista)->where('id_pregunta', $i)->first();
				if($detalleEntrevista != null){
					$nombreCampo = 'pregunta'.(string)$i;
					$entrevistaViewModel->$nombreCampo = $detalleEntrevista->texto_respuesta;
				}
			}
		
		}
		
		return View::make('entrevista.evaluate')->with(compact('entrevistaViewModel'));
        
    }
	
	
	
	public function aprobarEntrevista(Request $request)
    {
		$idProcesoAdmon = $request->idProceso;
		$comentarios = $request->comentariosAprobacion;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::ValidadoFacultad, 'Entrevista Aprobada por Facultad: '.$comentarios, $idProcesoAdmon);
		
		$historicos = HistoricosProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmon)->get();
		$validadoComercial = false;
		for( $i=0; $i<sizeof($historicos); $i++){
			if($historicos[$i]->id_estado == EstadosProcesoAdmisionEnum::ValidadoLiderComercial){
				$validadoComercial = true;
			}
		}
		
		//buscar el proceso por id
		
		$procesoAdmon = ProcesoAdmision::findOrFail($idProcesoAdmon);
		echo $validadoComercial;
		
		if($validadoComercial == true){
			HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::Validado, 'Estudiante con validación comercial y de facultad', $idProcesoAdmon);
			$procesoAdmon ->id_estado = EstadosProcesoAdmisionEnum::Validado;
			$procesoAdmon->save();
			
		}
		
		return redirect('/listarEntrevistas');
			
		
    }
	
	public function rechazarEntrevista(Request $request)
    {
		$idProcesoAdmon = $request->idProcesoR;
		$comentarios = $request->comentariosRechazo;
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::RechazadoPorEntrevista, 'Entrevista rechazada por Facultad: '.$comentarios, $idProcesoAdmon);
		
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmon)->get()->first();
		$procesoAdmon ->id_estado = EstadosProcesoAdmisionEnum::PreInscrito;
		$procesoAdmon->save();
			
		return redirect('/listarEntrevistas');
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
		
		//$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::PendienteValidacionEntrevista;
        $procesoAdmon->save();
		
        //return redirect('/home');
		
		return View::make('entrevista.confirmation');
		
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
