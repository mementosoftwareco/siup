<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\ProcesoAdmision;
use App\EstadosProcesoAdmisionEnum;
use App\SiupProgramas;
use App\VParametros;
use Mail;
use Carbon\Carbon;
use App\HistoricosProcesoAdmision;
use Auth;
use Validator;
use Response;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;


class PreinscripcionController extends Controller
{
    
	public function ajaxPrograma($idTipoPrograma){
		$tipoPrograma = '';
		if($idTipoPrograma == 1){
			$tipoPrograma = 'PREGRADO';
		}elseif($idTipoPrograma == 2){
			$tipoPrograma = 'POSTGRADO';
		}
		elseif($idTipoPrograma == 3){
			$tipoPrograma = 'EDUCACION CONTINUA';
		}
		$progs = SiupProgramas::where('activo', '=', 'Y')->where('tipo_programa', '=', $tipoPrograma)->orderBy('desc_programa')->pluck('desc_programa', 'cod_programa');
		$progs[null] = 'Seleccione...';
		return Response::json($progs);
    }
	
	public function ajaxProgramaPorModalidad($idModalidad, $idTipoPrograma){
		$tipoPrograma = '';
		if($idTipoPrograma == 1){
			$tipoPrograma = 'PREGRADO';
		}elseif($idTipoPrograma == 2){
			$tipoPrograma = 'POSTGRADO';
		}
		elseif($idTipoPrograma == 3){
			$tipoPrograma = 'EDUCACION CONTINUA';
		}
		$progs = SiupProgramas::where('activo', '=', 'Y')->where('tipo_programa', '=', $tipoPrograma)->where('modalidad', '=', $idModalidad)->orderBy('desc_programa')->pluck('desc_programa', 'cod_programa');
		$progs[null] = 'Seleccione...';
		return Response::json($progs);
    }
	
	//
	/**
     * Display the preinscripcion page
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        
			$progs = SiupProgramas::where('activo', '=', 'Y')->orderBy('desc_programa')->pluck('desc_programa', 'cod_programa');
			$tiposDocId = VParametros::where('tabla', '=', 'TIPO_DE_IDENTIFICACION')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		
		
		return view('preinscripcion.index')->with(compact('progs', 'tiposDocId'));
		
    }
	
	
	
	
	public function terms(Request $request)
    {
        return view('preinscripcion.terminos');
    }
	
	
	/**
     * Create a preinscripcion.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'tipoIdentificacion' => 'required|max:10',
			'numeroIdentificacion' => 'required|max:50',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100',
			'telefono' => 'numeric|required',
			'celular' => 'numeric|required',
			'email' => 'email|required|max:100',
			'tipoEdu' => 'required|max:10',
			'programa' => 'required|max:10',
			'termYCond' => 'required|max:10',
			'CaptchaCode' => 'required|max:4',
			
		]);
		
		$niceNames = array( 
			'tipoIdentificacion' => 'Tipo de Identificación',
			'numeroIdentificacion' => 'Número de Identificación',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'telefono' => 'Teléfono',
			'celular' => 'Celular',
			'email' => 'Email',
			'tipoEdu' => 'Tipo de Educación',
			'programa' => 'Programa',
			'termYCond' => 'Términos y Condiciones',
			'CaptchaCode' => 'Captcha',
		);
		
		
		$validator->setAttributeNames($niceNames); 
		
		//*
		if ($validator->fails()) {
            return redirect('/preinscripcion')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$code = $request->input('CaptchaCode');
		$isHuman = captcha_validate($code);

		if (! $isHuman) {
			$validator->errors()->add('CaptchaCode', 'Código de verificación inválido intenta de nuevo');
			 return redirect('/preinscripcion')
                        ->withErrors($validator)
                        ->withInput();
		} 
		
		//Guardando la información de la persona
		$persona = Persona::find($request->numeroIdentificacion);
		
		if($persona == null){
			$persona = new Persona;
		}
				
		$persona->nombres = $request->nombres;
		$persona->apellidos = $request->apellidos;
		$persona->id_tipo_identificacion = $request->tipoIdentificacion;
		$persona->id_persona = $request->numeroIdentificacion;
		$persona->save();

		//Guardando la información de la inscripción
		$inscripcion = new Inscripcion;
		$inscripcion->telefono = $request->telefono;
		$inscripcion->celular = $request->celular;
		$inscripcion->email = $request->email;
		$inscripcion->id_programa = $request->programa;
		$inscripcion->nombre_programa = $request->nombrePrograma;
		$inscripcion->acepta_terms_cond = $request->termYCond;
		$programaSeleccionado = SiupProgramas::where('cod_programa', '=', $inscripcion->id_programa )->first();
		$inscripcion->id_modalidad = $programaSeleccionado->modalidad;
		$inscripcion->save();
		
		//Guardando la información del proceso de admision
		$proceso = new ProcesoAdmision;
		$proceso->id_tipo_proceso = $request->tipoEdu;
		$proceso->id_persona = $persona->id_persona;
		$proceso->id_inscripcion = $inscripcion->id_inscripcion;
		$proceso->id_estado = EstadosProcesoAdmisionEnum::PreInscrito;
        $id_proceso = $proceso->save();
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::PreInscrito, 'Formulario de Preinscripción diligenciado', $proceso->id_proceso_admon);
				
		$this->enviarCorreoBienvenida($inscripcion, $persona, $proceso);
		
        //return redirect('/');
		return redirect('/confirmacion');
    }
	
	
	
	
	
	public function enviarCorreoBienvenida(Inscripcion $inscripcion, Persona $persona, ProcesoAdmision $proceso)
    {	
        Mail::send('preinscripcion.email.preinscripcion', ['persona' => $persona, 'inscripcion' => $inscripcion, 'proceso' => $proceso], function ($m) use ($inscripcion, $persona) {
            $m->to($inscripcion->email, $persona->nombres)->subject('Inscripción Iberoamericana');
        });
    }
}
