<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\ProcesoAdmision;
use App\EstadosProcesoAdmisionEnum;
use Mail;
use Carbon\Carbon;
use App\HistoricosProcesoAdmision;
use Auth;


class PreinscripcionController extends Controller
{
    //
	/**
     * Display the preinscripcion page
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('preinscripcion.index');
    }
	
	/**
     * Create a preinscripcion.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipoIdentificacion' => 'required|max:10',
			'numeroIdentificacion' => 'required|max:50',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100',
			'telefono' => 'required|max:50',
			'celular' => 'required|max:50',
			'email' => 'required|max:100',
			'tipoEdu' => 'required|max:10',
			'programa' => 'required|max:10',
			'termYCond' => 'required|max:10',
        ]);
/*
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
*/
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
		//$inscripcion->id_modalidad = $request->modalidad;
		$inscripcion->id_programa = $request->programa;
		$inscripcion->nombre_programa = $request->nombrePrograma;
		$inscripcion->acepta_terms_cond = $request->termYCond;
		$inscripcion->save();
		
		//Guardando la información del proceso de admision
		$proceso = new ProcesoAdmision;
		$proceso->id_tipo_proceso = $request->tipoEdu;
		$proceso->id_persona = $persona->id_persona;
		$proceso->id_inscripcion = $inscripcion->id_inscripcion;
		$proceso->id_estado = EstadosProcesoAdmisionEnum::PreInscrito;
        $id_proceso = $proceso->save();
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::PreInscrito, 'Preinscripción', $proceso->id_proceso_admon);
				
		$this->enviarCorreoBienvenida($inscripcion, $persona, $proceso);
		
        return redirect('/');
    }
	
	
	
	
	
	public function enviarCorreoBienvenida(Inscripcion $inscripcion, Persona $persona, ProcesoAdmision $proceso)
    {	
        Mail::send('preinscripcion.email.preinscripcion', ['persona' => $persona, 'inscripcion' => $inscripcion, 'proceso' => $proceso], function ($m) use ($inscripcion, $persona) {
            $m->to($inscripcion->email, $persona->nombres)->subject('Inscripción Iberoamericana');
        });
    }
}
