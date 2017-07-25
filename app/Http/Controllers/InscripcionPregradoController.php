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
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Auth;
use Mail;

class InscripcionPregradoController extends Controller
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
		$idEstadoProceso = EstadosProcesoAdmisionEnum::PreInscrito;
		$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		
        return view('inscripcionPregrado.list', [
            'procesosAdmon' => $procesosAdmon,
        ]);
		
    }
	
	//
	/**
     * Display the inscripcion pregrado page
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request, ProcesoAdmision $procesoAdmon)
    {
		$inscripcionPregrado = new InscripcionPregrado;
		$idInscripcion = $procesoAdmon -> id_inscripcion;
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$persona = Persona::findOrFail($procesoAdmon -> id_persona);
		
		$inscripcionPregrado->idProcesoAdmision = $procesoAdmon->id_proceso_admon;
		$inscripcionPregrado->nombres = $persona->nombres;
		$inscripcionPregrado->apellidos = $persona->apellidos;
		$inscripcionPregrado->tipoIdentificacion = $persona->id_tipo_identificacion;
		$inscripcionPregrado->numeroIdentificacion = $persona->id_persona;
		$inscripcionPregrado->fechaExpDocumento = $persona->fecha_expedicion_doc;
		$inscripcionPregrado->lugarExpDocumento = $persona->lugar_exped_doc;
		$inscripcionPregrado->fechaNacimiento = $persona->fecha_nacimiento;
		$inscripcionPregrado->genero = $persona->genero;
		
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$inscripcionPregrado->telefono = $inscripcion->telefono;
		$inscripcionPregrado->celular = $inscripcion->celular;
		$inscripcionPregrado->email = $inscripcion->email;
		$inscripcionPregrado->modalidad = $inscripcion->id_modalidad;
		$inscripcionPregrado->programa = $inscripcion->id_programa;
		$inscripcionPregrado->programa = $inscripcion->nombre_programa;
		$inscripcionPregrado->termYCond = $inscripcion->acepta_terms_cond;
		$inscripcionPregrado->procedencia = $inscripcion->procedencia;
		$inscripcionPregrado->estCivil = $inscripcion->id_estado_civil;
		$inscripcionPregrado->grupoEtnico = $inscripcion->id_grupo_etnico;
		$inscripcionPregrado->convenio = $inscripcion->id_convenio;
		
		$ubicacionGeografica = UbicacionesGeograficas::where('id_inscripcion', '=', $idInscripcion)->first();
		if($ubicacionGeografica != null){
			$inscripcionPregrado->idUbicacion = $ubicacionGeografica->id_ubicacion;
			$inscripcionPregrado->direccion = $ubicacionGeografica->direccion;
			$inscripcionPregrado->departamento = $ubicacionGeografica->id_departamento;
			$inscripcionPregrado->ciudad = $ubicacionGeografica->id_ciudad;
			$inscripcionPregrado->municipio = $ubicacionGeografica->municipio;
			$inscripcionPregrado->barrio = $ubicacionGeografica->barrio;
			$inscripcionPregrado->estrato = $ubicacionGeografica->estrato;
		}
		
		$refsPersonalFamiliar = RefsPersonalFamiliar::where('id_inscripcion', '=', $idInscripcion)->first();
		if($refsPersonalFamiliar != null){
			$inscripcionPregrado->idReferencia = $refsPersonalFamiliar->id_referencia;
			$inscripcionPregrado->nombresReferencia = $refsPersonalFamiliar->nombres;
			$inscripcionPregrado->apellidosReferencia = $refsPersonalFamiliar->apellidos;
			$inscripcionPregrado->direccionReferencia = $refsPersonalFamiliar->direccion;
			$inscripcionPregrado->telefonoReferencia = $refsPersonalFamiliar->telefono;
			$inscripcionPregrado->celularReferencia = $refsPersonalFamiliar->celular;
			$inscripcionPregrado->emailReferencia = $refsPersonalFamiliar->email;
			$inscripcionPregrado->parentescoRef = $refsPersonalFamiliar->parentesco;
		}
		
		$estudios = Educaciones::where('id_inscripcion', '=', $idInscripcion)->first();
		if($estudios != null){
			$inscripcionPregrado->idEducacion = $estudios->id_educacion;
			$inscripcionPregrado->tipoDeColegio = $estudios->tipo_educacion;
			$inscripcionPregrado->colegio = $estudios->nombre_inst;
			$inscripcionPregrado->ciudadColegio = $estudios->id_ciudad_inst;
			$inscripcionPregrado->barrioColegio = $estudios->barrio_inst;
			$inscripcionPregrado->jornadaColegio = $estudios->jornada;
			$inscripcionPregrado->codigoIcfesColegio = $estudios->cod_icfes_inst;
			$inscripcionPregrado->anioIcfesColegio = $estudios->anio_icfes_inst;
		}
		
		$homologacion = Homologacion::where('id_inscripcion', '=', $idInscripcion)->first();
		if($homologacion != null){
			$inscripcionPregrado->homologacion = 1;
			$inscripcionPregrado->idHomologacion = $homologacion->id_homologacion;
			$inscripcionPregrado->tituloHomologacion = $homologacion->titulo;
			$inscripcionPregrado->instHomologacion = $homologacion->institucion;
			$inscripcionPregrado->ciudadHomologacion = $homologacion->id_ciudad;
			$inscripcionPregrado->fechaFinHomologacion = $homologacion->fecha_finalizacion;
		}
		return View::make('inscripcionPregrado.index')->with(compact('inscripcionPregrado'));
        
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
            'tipoIdentificacion' => 'required|max:10',
			'numeroIdentificacion' => 'required|max:50',
			'fechaExpDocumento' => 'required|max:10',
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
			'termYCond' => 'accepted',
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
			//'tituloHomologacion' => 'required|max:200',
			//'instHomologacion' => 'required|max:200',
			//'ciudadHomologacion' => 'required|max:10',
			//'fechaFinHomologacion' => 'required|max:10',
        ]);

		$idInscripcion = $procesoAdmon -> id_inscripcion;
		
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
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
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
		$ubicacionGeografica = UbicacionesGeograficas::find($request -> idUbicacion);
		if($ubicacionGeografica == null){
			$ubicacionGeografica = new UbicacionesGeograficas;
		}
		$ubicacionGeografica->direccion = $request->direccion;
		$ubicacionGeografica->id_departamento = $request->departamento;
		$ubicacionGeografica->id_ciudad = $request->ciudad;
		$ubicacionGeografica->municipio = $request->municipio;
		$ubicacionGeografica->barrio = $request->barrio;
		$ubicacionGeografica->estrato = $request->estrato;
		$ubicacionGeografica->id_inscripcion = $idInscripcion;
		
		$ubicacionGeografica->save();
		
		//Guardando la información de la referencia personal
		$refsPersonalFamiliar = RefsPersonalFamiliar::find($request -> idReferencia);
		if($refsPersonalFamiliar == null){
			$refsPersonalFamiliar = new RefsPersonalFamiliar;
		}
		$refsPersonalFamiliar->nombres = $request->nombresReferencia;
		$refsPersonalFamiliar->apellidos = $request->apellidosReferencia;
		$refsPersonalFamiliar->direccion = $request->direccionReferencia;
		$refsPersonalFamiliar->telefono = $request->telefonoReferencia;
		$refsPersonalFamiliar->celular = $request->celularReferencia;
		$refsPersonalFamiliar->email = $request->emailReferencia;
		$refsPersonalFamiliar->parentesco = $request->parentescoRef;
		$refsPersonalFamiliar->id_inscripcion = $idInscripcion;
		
		$refsPersonalFamiliar->save();
		
		//Guardando la información de los estudios de secundaria
		$estudios =Educaciones::find($request -> idEducacion);
		if($estudios == null){
			$estudios = new Educaciones;
		}
		
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
		$estudios->id_inscripcion = $idInscripcion;
		
		$estudios->save();
		
		//Guardando la información de la referencia personal
		if($request->homologacion == 1){
			$homologacion =Homologacion::find($request -> idHomologacion);
			if($homologacion == null){
				$homologacion = new Homologacion;
			}
			$homologacion->titulo = $request->tituloHomologacion;
			$homologacion->institucion = $request->instHomologacion;
			$homologacion->id_ciudad = $request->ciudadHomologacion;
			$homologacion->fecha_finalizacion = $request->fechaFinHomologacion;
			$homologacion->id_inscripcion = $idInscripcion;
			
			$homologacion->save();
		}
		
		///*
		$historicoProcesos = new HistoricosProcesoAdmision;
		$historicoProcesos->id_usuario = Auth::user()->id;
		$historicoProcesos->id_estado = EstadosProcesoAdmisionEnum::PreInscritoFormularioInscripcion;
		$historicoProcesos->id_proceso_admon = $procesoAdmon->id_proceso_admon;
		$historicoProcesos->comentarios = "Modificado por usuario " . Auth::user()->name;
		$historicoProcesos->fecha = Carbon::now();
		
		$historicoProcesos->save();
		//*/
		
		//$nuevoEstadoProceso = EstadosProcesoAdmisionEnum::calcularProximoEstadoProceso($procesoAdmon, EstadosProcesoAdmisionEnum::PreInscritoFormularioInscripcion);
		$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::PreInscrito;
        $procesoAdmon->save();
		
		$this->enviarCorreoCuestionario($inscripcion, $procesoAdmon, $persona);
		
        return redirect('/menu');
    }
	
	public function enviarCorreoCuestionario(Inscripcion $inscripcion, ProcesoAdmision $procesoAdmon, Persona $persona)
    {
        Mail::send('entrevista.email.cuestionarioEntrevista', ['persona' => $persona, 'procesoAdmon' => $procesoAdmon], function ($m) use ($procesoAdmon, $persona, $inscripcion) {
            $m->to($inscripcion->email, $persona->nombres)->subject('Cuestionario Iberoamericana');
        });
    }
}
