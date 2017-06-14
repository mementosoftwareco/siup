<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\ProcesoAdmision;

class InscripcionPregradoController extends Controller
{
    //
	/**
     * Display the inscripcion pregrado page
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request, Inscripcion $inscripcion)
    {
		//return View::make('inscripcionPregrado.index')->with(compact('inscripcion'));
        return view('inscripcionPregrado.index', ['telefono' => 'James']);
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
			'idInscripcion' => 'required|max:10',
			'idProcesoAdmon' => 'required|max:10',
            'tipoIdentificacion' => 'required|max:10',
			'numeroIdentificacion' => 'required|max:50',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100',
			'telefono' => 'required|max:50',
			'celular' => 'required|max:50',
			'email' => 'required|max:100',
			'fechaNacimiento' => 'required|max:10',
			'genero' => 'required|max:10',
			'grupoEtnico' => 'required|max:10',
			'tipoEdu' => 'required|max:10',
			'modalidad' => 'required|max:10',
			'programa' => 'required|max:10',
			'estCivil' => 'required|max:10',
			'procedencia' => 'required|max:50',
			'convenio' => 'required|max:10',
			'termYCond' => 'required|max:10',
			//Campos ubicacion
			'direccion' => 'required|max:300',
			'departamento' => 'required|max:50',
			'ciudad' => 'required|max:10',
			'municipio' => 'required|max:10',
			'barrio' => 'required|max:200',
			'estrato' => 'required|max:10',
			//Campos referencia personal
			'nombresReferencia' => 'required|max:200',
			'apellidosReferencia' => 'required|max:200',
			'direccionReferencia' => 'required|max:300',
			'telefonoReferencia' => 'required|max:50',
			'celularReferencia' => 'required|max:50',
			'emailReferencia' => 'required|max:50',
			'parentescoRef' => 'required|max:50',
			//informacion estudios de secundaria
			'tipoDeColegio' => 'required|max:10',
			'colegio' => 'required|max:200',
			'ciudadColegio' => 'required|max:10',
			'barrioColegio' => 'required|max:100',
			'jornadaColegio' => 'required|max:10',
			'codigoIcfesColegio' => 'required|max:20',
			'anioIcfesColegio' => 'required|max:4',
			//Homologacion desde otra institucion
			'homologacion' => 'required|max:200',
			'tituloHomologacion' => 'required|max:200',
			'instHomologacion' => 'required|max:200',
			'ciudadHomologacion' => 'required|max:10',
			'fechaFinHomologacion' => 'required|max:10',
        ]);

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
		
		$inscripcion =Inscripcion::find($request->idInscripcion);
		$inscripcion->telefono = $request->telefono;
		$inscripcion->celular = $request->celular;
		$inscripcion->email = $request->email;
		$inscripcion->id_modalidad = $request->modalidad;
		$inscripcion->id_programa = $request->programa;
		$inscripcion->nombre_programa = $request->programa;
		$inscripcion->acepta_terms_cond = $request->termYCond;
		$inscripcion->procedencia = $request->procedencia;
		$inscripcion->id_estado_civil = $request->estCivil;
		$inscripcion->id_grupo_etnico = $request->grupoEtnico;
		$inscripcion->id_convenio = $request->convenio;
		$inscripcion->save();
		
		//Guardando la información del proceso de admision
		$proceso = ProcesoAdmision::find($request->idProcesoAdmon);
		$proceso->id_tipo_proceso = $request->tipoEdu;
		$proceso->id_persona = $persona->id_persona;
		$proceso->id_inscripcion = $inscripcion->id_inscripcion;
        $proceso->save();
		
        return redirect('/');
    }
}
