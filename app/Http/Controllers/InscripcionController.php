<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\User;
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
use App\SiupProgramas;
use App\Periodo;
use App\PeriodoPrograma;
use App\Jornada;
use App\JornadaPrograma;
use App\VParametros;
use App\Convenio;
use App\Nodo;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Auth;
use Mail;
use DB;
use Response;
use Illuminate\Support\Facades\Input;

class InscripcionController extends Controller
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
		//$idEstadoProceso = EstadosProcesoAdmisionEnum::PreInscrito;
		//$procesosAdmon = ProcesoAdmision::where('id_estado', '=', $idEstadoProceso)->get();
		
		
		//$idEstadoProceso = EstadosProcesoAdmisionEnum::PreInscrito;
		$procesosAdmon = ProcesoAdmision::where('id_usuario', '=', Auth::user()->id)->where('id_estado','<', EstadosProcesoAdmisionEnum::InscritoPendienteValidaciónComercial)->get();
		
        return view('inscripcion.list', [
            'procesosAdmon' => $procesosAdmon, 
        ]);
		
    }
	
	
	public function buscarAspirante(Request $request)
    {
		$identificacion = Input::get('identificacion');		
		$procesosAdmon = ProcesoAdmision::where('id_persona', '=', $identificacion)->get();
		
		
		
        return view('inscripcion.list', [
            'procesosAdmon' => $procesosAdmon, 
        ]);
		
    }
	
	
	
	public function asignarAspirante($idProcesoAdmision)
    {
				
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmision)->get()->first();
		$procesoAdmon->id_usuario=Auth::user()->id;
		$procesoAdmon->save();
		
		$procesosAdmon = ProcesoAdmision::where('id_usuario', '=', Auth::user()->id)->get();
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::PreInscrito, 'El usuario: '.Auth::user()->name.' se ha asignado este proceso de admisión', $idProcesoAdmision);
		
        return view('inscripcion.list', [
            'procesosAdmon' => $procesosAdmon,
        ]);
		
    }
	
	

	
	
	public function enviarValidacionComercial(Request $request)
    {
		$idProcesoAdmision = $request->idProceso;
		$comentariosValidacion = $request->comentariosValidacion;
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::InscritoPendienteValidaciónComercial, 'Enviado a Validación de Líder Comercial: '.$comentariosValidacion, $idProcesoAdmision);
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::InscritoPendienteEntrevista, 'Enviado Formulario de Entrevista a Estudiante: '.$comentariosValidacion, $idProcesoAdmision);
		
		$procesoAdmon = ProcesoAdmision::where('id_proceso_admon', '=', $idProcesoAdmision)->get()->first();
		$procesoAdmon->id_estado=EstadosProcesoAdmisionEnum::Inscrito;
		$procesoAdmon->save();
		
		$procesosAdmon = ProcesoAdmision::where('id_usuario', '=', Auth::user()->id)->where('id_estado','<', EstadosProcesoAdmisionEnum::InscritoPendienteValidaciónComercial)->get();
		
		$idInscripcion = $procesoAdmon -> id_inscripcion;
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$persona = Persona::findOrFail($procesoAdmon -> id_persona);
		$this->enviarCorreoCuestionario($inscripcion, $procesoAdmon, $persona);
		
	
		
        return view('inscripcion.list', [
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
		$user = new User;
		$perfil = $user->obtenerNombrePerfil();

		if ( $perfil === 'Operador' || $perfil === 'Call Center' || $perfil === 'Comercial'){
         $edicion=false;
		 $breadcrumb='formularioInscripcion';
	 	}
		if ( $perfil === 'Líder Comercial' ){
         $edicion=true;
		 $breadcrumb='validacionFormularioInscripcion';
		}
		if ( $perfil === 'Admisiones' ){
         $edicion=true;
		 $breadcrumb='validacionFormularioInscripcionAdmision';
		}
		
		
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
		
		$inscripcionPregrado->tipoEdu = $procesoAdmon -> id_tipo_proceso;
		
		$inscripcion =Inscripcion::findOrFail($idInscripcion);
		$inscripcionPregrado->telefono = $inscripcion->telefono;
		$inscripcionPregrado->celular = $inscripcion->celular;
		$inscripcionPregrado->email = $inscripcion->email;
		$inscripcionPregrado->modalidad = $inscripcion->id_modalidad;
		$inscripcionPregrado->programa = $inscripcion->id_programa;
		$inscripcionPregrado->periodo = $inscripcion->id_periodo_programa;
		$inscripcionPregrado->jornada = $inscripcion->id_jornada_programa;
		$inscripcionPregrado->termYCond = $inscripcion->acepta_terms_cond;
		$inscripcionPregrado->procedencia = $inscripcion->procedencia;
		$inscripcionPregrado->estCivil = $inscripcion->id_estado_civil;
		$inscripcionPregrado->grupoEtnico = $inscripcion->id_grupo_etnico;
		$inscripcionPregrado->nodo = $inscripcion->id_nodo;
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
		
		if($estudios != null && $procesoAdmon -> id_tipo_proceso == 1){
			$inscripcionPregrado->idEducacion = $estudios->id_educacion;
			$inscripcionPregrado->tipoDeColegio = $estudios->tipo_educacion;
			$inscripcionPregrado->colegio = $estudios->nombre_inst;
			$inscripcionPregrado->ciudadColegio = $estudios->id_ciudad_inst;
			$inscripcionPregrado->barrioColegio = $estudios->barrio_inst;
			$inscripcionPregrado->jornadaColegio = $estudios->jornada;
			$inscripcionPregrado->codigoIcfesColegio = $estudios->cod_icfes_inst;
			$inscripcionPregrado->anioIcfesColegio = $estudios->anio_icfes_inst;
		}
		if($estudios != null && $procesoAdmon -> id_tipo_proceso == 2){
			$inscripcionPregrado->idEducacion = $estudios->id_educacion;
			$inscripcionPregrado->programaPregrado = $estudios->programa_pregrado;
			$inscripcionPregrado->tituloPregrado = $estudios->grado_obtenido;
			$inscripcionPregrado->universidadPregado = $estudios->nombre_inst;
			$inscripcionPregrado->ciudadPregrado = $estudios->id_ciudad_inst;
			$inscripcionPregrado->fechaFinPregrado = $estudios->fecha_graduacion;
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
		
		$deptos = Departamento::all('nombre', 'codigo')->sortBy('nombre')->pluck('nombre', 'codigo');
		if($ubicacionGeografica != null){
			$ciudades = Municipio::where('codigo_depto', '=', $ubicacionGeografica->id_departamento)->orderBy('nombre')->pluck('nombre', 'codigo');
			$centrosPoblados = CentroPoblado::where('codigo_municipio', '=', $ubicacionGeografica->id_ciudad)->orderBy('nombre')->pluck('nombre', 'codigo');
		}else{
			$ciudades = [];
			$centrosPoblados = [];
		}
		
		$ciudadesTotal = Municipio::all('nombre', 'codigo')->sortBy('nombre')->pluck('nombre', 'codigo');
		
		//Cargando las listas de tipos de documentos, programas, 
		$progs = SiupProgramas::where('activo', '=', 'Y')->orderBy('desc_programa')->pluck('desc_programa', 'cod_programa');
		$tiposDocId = VParametros::where('tabla', '=', 'TIPO_DE_IDENTIFICACION')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoEstadosCiviles = VParametros::where('tabla', '=', 'ESTADO_CIVIL')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoGeneros = VParametros::where('tabla', '=', 'GENERO')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoNivelEdu = VParametros::where('tabla', '=', 'NIVEL_EDUCATIVO')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoTipoEtnia = VParametros::where('tabla', '=', 'TIPO_DE_ETNIA')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoTipoParentesco = VParametros::where('tabla', '=', 'TIPO_PARENTESCO')->orderBy('descripcion')->pluck('descripcion', 'codigo');
		$listadoNodos = Nodo::where('1', '=', '1')->orderBy('nombre')->pluck('nombre', 'id_nodo');
		$listadoConvenios = $this->obtenerConveniosPorNodo($inscripcion->id_nodo);
		$periodos = $this->obtenerPeriodosPorPrograma($inscripcion->id_programa, $inscripcionPregrado->homologacion);
		$jornadas = $this->obtenerJornadasPorPrograma($inscripcion->id_programa);
		
		return View::make('inscripcion.index')->with(compact('inscripcionPregrado', 'deptos', 'ciudades', 'centrosPoblados', 'ciudadesTotal', 'progs', 'periodos', 'jornadas', 'tiposDocId', 'listadoEstadosCiviles', 'listadoGeneros', 'listadoNivelEdu', 'listadoTipoEtnia', 'listadoTipoParentesco', 'edicion', 'breadcrumb', 'listadoNodos','listadoConvenios'));
        
    }
	
	public function ajaxDeptoCiudad($id){
		
		$ciudades = Municipio::where('codigo_depto', '=', $id)->orderBy('nombre')->pluck('nombre', 'codigo');
		$ciudades[1] = 'Seleccione...';
		return Response::json($ciudades );
    }
	
	public function ajaxCiudadMunicipio($id){
		
		$municipios = CentroPoblado::where('codigo_municipio', '=', $id)->orderBy('nombre')->pluck('nombre', 'codigo');
		$municipios[1] = 'Seleccione...';
		return Response::json($municipios);
    }
	
	public function ajaxPeriodo($codPrograma, $isHomologacion){
		$periodos = $this->obtenerPeriodosPorPrograma($codPrograma, $isHomologacion);
		return Response::json($periodos);
    }
	
	public function ajaxConvenio($idNodo){
		$listadoConvenios = $this->obtenerConveniosPorNodo($idNodo);
		return Response::json($listadoConvenios);
    }
	
	private function obtenerConveniosPorNodo($idNodo){
		$listadoConvenios = Convenio::where('estado', '=', 'S')->where('id_nodo', '=', $idNodo)->orderBy('nombre')->pluck('nombre', 'codigo');
		$listadoConvenios[null] = 'Seleccione...';
		return $listadoConvenios;
	}
	
	private function obtenerPeriodosPorPrograma($codPrograma, $isHomologacion){
		$dt = Carbon::now();
		$nombreColumnafechaInicial = $isHomologacion == 1 ? 'fecha_inicial_hom' : 'fecha_inicial_inscripcion';
		$nombreColumnafechaFinal = $isHomologacion == 1 ? 'fecha_final_hom' : 'fecha_final_inscripcion';
		$periodos = DB::table('periodos_programas')
            ->join('periodos', 'periodos_programas.id_periodo', '=', 'periodos.id_periodo')
            ->select('periodos_programas.id_periodo_programa','periodos_programas.cod_programa','periodos.cod_periodo', 'periodos.'.$nombreColumnafechaInicial, 'periodos.'.$nombreColumnafechaFinal)
			->where('cod_programa', '=', $codPrograma)->where($nombreColumnafechaInicial, '<=', $dt)->where($nombreColumnafechaFinal, '>=', $dt)->orderBy('id_periodo_programa')->pluck('cod_periodo', 'id_periodo_programa');
		$periodos[null] = 'Seleccione...';
		
		return $periodos;
	}
	
	public function ajaxJornada($codPrograma){
		$jornadas = $this->obtenerJornadasPorPrograma($codPrograma);
		return Response::json($jornadas);
    }
	
	private function obtenerJornadasPorPrograma($codPrograma){
		$dt = Carbon::now();
		$jornadas = DB::table('jornadas_programas')
            ->join('jornadas', 'jornadas_programas.id_jornada', '=', 'jornadas.id_jornada')
            ->select('jornadas_programas.id_jornada_programa','jornadas_programas.cod_programa','jornadas.nombre')
			->where('cod_programa', '=', $codPrograma)->orderBy('id_jornada_programa')->pluck('nombre', 'id_jornada_programa');
		$jornadas[null] = 'Seleccione...';
		
		return $jornadas;
	}
	
	/**
     * Create a preinscripcion.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, ProcesoAdmision $procesoAdmon)
    {
		
        if($request->validacion == 'true'){
			$this->validate($request, [
				'tipoIdentificacion' => 'required|max:10',
				'numeroIdentificacion' => 'required|max:50',
				'fechaExpDocumento' => 'required|max:10',
				'lugarExpDocumento' => 'required|max:100',
				'nombres' => 'required|max:100',
				'apellidos' => 'required|max:100',
				'telefono' => 'numeric|required',
				'celular' => 'numeric|required',
				'email' => 'email|required|max:100',
				//'fechaNacimiento' => 'required|max:10',
				'genero' => 'required|max:10',
				'grupoEtnico' => 'required|max:10',
				'tipoEdu' => 'required|max:10',
				'modalidad' => 'required|max:10',
				'programa' => 'required|max:10',
				'periodo' => 'required|max:10',
				'jornada' => 'required|max:10',
				'estCivil' => 'required|max:10',
				'procedencia' => 'required|max:50',
				'convenio' => 'required|max:10',
				'nodo' => 'required|max:10',
				'termYCond' => 'accepted',
				//Campos ubicacion
				'direccion' => 'required|max:300',
				'departamento' => 'required|max:50',
				'ciudad' => 'required|max:10',
				
				//'municipio' => 'required|max:10',
				'barrio' => 'required|max:200',
				'estrato' => 'required|max:10',
				//Campos referencia personal
				'nombresReferencia' => 'required|max:200',
				'apellidosReferencia' => 'required|max:200',
				'direccionReferencia' => 'required|max:300',
				'telefonoReferencia' => 'numeric|required',
				'celularReferencia' => 'numeric|required',
				'emailReferencia' => 'email|required|max:50',
				'parentescoRef' => 'required|max:50',
				
			]);
			
			//validando formulario de pregrado
			if($request->tipoEdu == 1){
				$this->validate($request, [
					//informacion estudios de secundaria
					'tipoDeColegio' => 'required|max:10',
					'colegio' => 'required|max:200',
					'ciudadColegio' => 'required|max:10',
					'barrioColegio' => 'required|max:100',
					'jornadaColegio' => 'required|max:10',
					'anioIcfesColegio' => 'required|max:4',
				]);
				if($request->anioIcfesColegio >= 2000){
					$this->validate($request, [				
						'codigoIcfesColegio' => ['required','max:14','regex:"AC[0-9]{4}[1-2]{1}[0-9]{7}|VG[0-9]{4}[1-2]{1}[0-9]{7}"'],
					]);
				}
				
				if($request->anioIcfesColegio < 2000){
					$this->validate($request, [				
						'codigoIcfesColegio' => ['required','max:12','regex:"AC[0-9]{2}[1-2]{1}[0-9]{7}|VG[0-9]{2}[1-2]{1}[0-9]{7}"'],
					]);
				}
				
						
				if($request->homologacion == 1){
					$this->validate($request, [
					//Homologacion desde otra institucion
					'homologacion' => 'required|max:200',
					'tituloHomologacion' => 'required|max:200',
					'instHomologacion' => 'required|max:200',
					'ciudadHomologacion' => 'required|max:10',
					'fechaFinHomologacion' => 'required|max:10',
					]);
				}
			}
			
			//validando formulario de postgrado
			if($request->tipoEdu == 2){
				$this->validate($request, [
					//informacion estudios de secundaria
					'programaPregrado' => 'required|max:400',
					'tituloPregrado' => 'required|max:200',
					'universidadPregado' => 'required|max:300',
					'ciudadPregrado' => 'required|max:200',
					'fechaFinPregrado' => 'required|max:10',
					]);			
			}
		}
		
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
		$inscripcion->id_programa = $request->programa;
		$programaSeleccionado = SiupProgramas::where('cod_programa', '=', $inscripcion->id_programa )->first();
		$inscripcion->id_modalidad = $programaSeleccionado->modalidad;
		$inscripcion->nombre_programa = $request->nombrePrograma;
		$inscripcion->id_periodo_programa = $request->periodo;
		$inscripcion->id_jornada_programa = $request->jornada;
		$inscripcion->acepta_terms_cond = $request->termYCond;
		$inscripcion->acepta_terms_cond = $request->termYCond;
		$inscripcion->procedencia = $request->procedencia;
		$inscripcion->id_estado_civil = $request->estCivil;
		$inscripcion->id_grupo_etnico = $request->grupoEtnico;
		$inscripcion->id_nodo = $request->nodo;
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
		
		//Si es pregrado
		if($request->tipoEdu == 1){
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
		}
		
		//Si es postgrado
		if($request->tipoEdu == 2){
			//$estudios->tipo_educacion = $request->tipoDeColegio;
			$estudios->nombre_inst = $request->universidadPregado;
			$estudios->grado_obtenido = $request->tituloPregrado;
			$estudios->programa_pregrado = $request->programaPregrado;
			//$estudios->anio_finalizacion = $request->modalidad;
			$estudios->id_ciudad_inst = $request->ciudadPregrado;
			//$estudios->barrio_inst = $request->barrioColegio;
			//$estudios->jornada = $request->jornadaColegio;
			//$estudios->cod_icfes_inst = $request->codigoIcfesColegio;
			//$estudios->anio_icfes_inst = $request->anioIcfesColegio;
			$estudios->fecha_graduacion = $request->fechaFinPregrado;
			$estudios->id_inscripcion = $idInscripcion;
			
			$estudios->save();
		}
		
		
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
		
		
		//$nuevoEstadoProceso = EstadosProcesoAdmisionEnum::calcularProximoEstadoProceso($procesoAdmon, EstadosProcesoAdmisionEnum::PreInscritoFormularioInscripcion);
		//$procesoAdmon->id_estado = EstadosProcesoAdmisionEnum::PreInscritoFormularioInscripcion;
		$procesoAdmon->id_tipo_proceso = $request->tipoEdu;
        $procesoAdmon->save();
		
		HistoricosProcesoAdmision::storeHistoricoProceso(EstadosProcesoAdmisionEnum::PreInscritoFormularioInscripcion, 'Edición de formulario de inscripción', $procesoAdmon->id_proceso_admon);
				
        //return redirect('/menu');
	
		 return redirect('/inscripcion.list/');
	
    }
	
	public function enviarCorreoCuestionario(Inscripcion $inscripcion, ProcesoAdmision $procesoAdmon, Persona $persona)
    {
        Mail::send('entrevista.email.cuestionarioEntrevista', ['persona' => $persona, 'procesoAdmon' => $procesoAdmon], function ($m) use ($procesoAdmon, $persona, $inscripcion) {
            $m->to($inscripcion->email, $persona->nombres)->subject('Cuestionario Iberoamericana');
        });
    }
}
