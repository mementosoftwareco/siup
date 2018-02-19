<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class InscripcionPregrado extends Model
{
	
	protected $dates = ['fechaNacimiento'];
	
    public $idProcesoAdmision;
	public $tipoIdentificacion;
	public $numeroIdentificacion;
	public $fechaExpDocumento;
	public $lugarExpDocumento;
	public $nombres;
	public $apellidos;
	public $telefono;
	public $celular;
	public $email;
	public $fechaNacimiento;
	public $genero;
	public $grupoEtnico;
	public $tipoEdu;
	public $modalidad;
	public $programa;
	public $nombrePrograma;
	public $jornada;
	public $periodo;
	public $estCivil;
	public $procedencia;
	public $nodo;
	public $convenio;
	public $termYCond;
	//Campos ubicacion
	public $idUbicacion;
	public $direccion;
	public $departamento;
	public $ciudad;
	public $municipio;
	public $barrio;
	public $estrato;
	//Campos referencia personal
	public $idReferencia;
	public $nombresReferencia;
	public $apellidosReferencia;
	public $direccionReferencia;
	public $telefonoReferencia;
	public $celularReferencia;
	public $emailReferencia;
	public $parentescoRef;
	//informacion estudios de secundaria
	public $idEducacion;
	public $tipoDeColegio;
	public $colegio;
	public $ciudadColegio;
	public $barrioColegio;
	public $jornadaColegio;
	public $codigoIcfesColegio;
	public $anioIcfesColegio;
	//Homologacion desde otra institucion
	public $idHomologacion;
	public $homologacion = 0;
	public $tituloHomologacion;
	public $instHomologacion;
	public $ciudadHomologacion;
	public $fechaFinHomologacion;
	//informacion de estudios de pregrado
	public $programaPregrado;
	public $tituloPregrado;
	public $universidadPregado;
	public $ciudadPregrado;
	public $fechaFinPregrado;
	
		
}
