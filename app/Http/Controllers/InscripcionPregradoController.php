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
            'tipoIdentificacion' => 'required|max:10',
			'numeroIdentificacion' => 'required|max:50',
			//'fechaExpDocumento' => 'required|max:10',
			'lugarExpDocumento' => 'required|max:100',
			'nombres' => 'required|max:100',
			'apellidos' => 'required|max:100',
			'telefono' => 'required|max:50',
			'celular' => 'required|max:50',
			'email' => 'required|max:100',
			//'fechaNacimiento' => 'required|max:10',
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
			//'homologacion' => 'required|max:200',
			'tituloHomologacion' => 'required|max:200',
			'instHomologacion' => 'required|max:200',
			'ciudadHomologacion' => 'required|max:10',
			//'fechaFinHomologacion' => 'required|max:10',
        ]);

		//Guardando la información de la persona
		$persona = Persona::findOrFail($request->numeroIdentificacion);
		
		$persona->nombres = $request->nombres;
		$persona->apellidos = $request->apellidos;
		$persona->id_tipo_identificacion = $request->tipoIdentificacion;
		$persona->id_persona = $request->numeroIdentificacion;
		$persona->fecha_expedicion_doc = $request->fechaExpDocumento;
		$persona->lugar_exped_doc = $request->lugarExpDocumento;
		$persona->fecha_nacimiento = $request->fechaNacimiento;
		$persona->genero = $request->genero;
		$persona->save();

		//Guardando la información de la inscripción
		$inscripcion =Inscripcion::findOrFail($request->idInscripcion);
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
		
		//Guardando la información de la ubicacion geografica
		$ubicacionGeografica = new UbicacionesGeograficas;
		$ubicacionGeografica->direccion = $request->direccion;
		$ubicacionGeografica->id_departamento = $request->departamento;
		$ubicacionGeografica->id_ciudad = $request->ciudad;
		$ubicacionGeografica->municipio = $request->municipio;
		$ubicacionGeografica->barrio = $request->barrio;
		$ubicacionGeografica->estrato = $request->estrato;
		$ubicacionGeografica->id_inscripcion = $request->idInscripcion;
		
		$ubicacionGeografica->save();
		
		//Guardando la información de la referencia personal
		$refsPersonalFamiliar = new RefsPersonalFamiliar;
		$refsPersonalFamiliar->nombres = $request->nombresReferencia;
		$refsPersonalFamiliar->apellidos = $request->apellidosReferencia;
		$refsPersonalFamiliar->direccion = $request->direccionReferencia;
		$refsPersonalFamiliar->telefono = $request->telefonoReferencia;
		$refsPersonalFamiliar->celular = $request->celularReferencia;
		$refsPersonalFamiliar->email = $request->emailReferencia;
		$refsPersonalFamiliar->parentesco = $request->parentescoRef;
		$refsPersonalFamiliar->id_inscripcion = $request->idInscripcion;
		
		$refsPersonalFamiliar->save();
		
		//Guardando la información de los estudios de secundaria
		$estudios = new Educaciones;
		$estudios->tipo_educacion = $request->tipoDeColegio;
		$estudios->nombre_inst = $request->colegio;
		//$estudios->grado_obtenido = $request->email;
		//$estudios->anio_finalizacion = $request->modalidad;
		$estudios->id_ciudad_inst = $request->ciudadColegio;
		$estudios->barrio_inst = $request->barrioColegio;
		$estudios->jornada = $request->jornadaColegio;
		$estudios->cod_icfes_inst = $request->codigoIcfesColegio;
		$estudios->anio_icfes_inst = $request->anioIcfesColegio;
		//$estudios->fecha_graduacion = $request->programa;
		$estudios->id_inscripcion = $request->idInscripcion;
		
		$estudios->save();
		
		//Guardando la información de la referencia personal
		$homologacion = new Homologacion;
		$homologacion->titulo = $request->tituloHomologacion;
		$homologacion->institucion = $request->instHomologacion;
		$homologacion->id_ciudad = $request->ciudadHomologacion;
		$homologacion->fecha_finalizacion = $request->fechaFinHomologacion;
		$homologacion->id_inscripcion = $request->idInscripcion;
		
		$homologacion->save();
		
		//Guardando la información del proceso de admision
		/*
		$proceso = ProcesoAdmision::findOrFail($request->idProcesoAdmon);
		$proceso->id_tipo_proceso = $request->tipoEdu;
		$proceso->id_persona = $persona->id_persona;
		$proceso->id_inscripcion = $inscripcion->id_inscripcion;
        $proceso->save();
		*/
        return redirect('/');
    }
}
