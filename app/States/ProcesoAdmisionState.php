<?php

namespace App;

use App\ProcesoAdmision;
use App\HistoricosProcesoAdmision;

interface ProcesoAdmisionState
{
	const PreInscrito = 1;	    
	const PreInscritoFormularioInscripcion = 2;	    
	const PreInscritoDocumentos = 3;	    
	const PendienteValidaciónInscripcion= 4;    
	const InscritoPendienteValidaciónComercial= 5;	    
	const InscritoPendienteEntrevista= 6;	    
	const PendienteValidacionEntrevista= 7;	    
	const RechazadoPorInscripcion= 8;	    
	const RechazadoPorDocumentos= 9;   
	const RechazadoPorEntrevista= 10;	
	const RechazadoPorAdmision= 11;	
	const ValidadoLiderComercial= 12;	
	const ValidadoFacultad= 13;	
	const Admitido= 14;
	
	public function preinscribir();
    public function llenarFormularioInscripcion();
    public function cargarDocumentos();
    public function aprobarFormularioInscripcion();
	public function rechazarFormularioInscripcion();
	public function aprobarDocumentos();
	public function rechazarDocumentos();
	public function aprobarEntrevista();
	public function rechazarEntrevista();
	public function aprobarComercial();
	public function rechazarComercial();
	public function aprobarFacultad();
	public function rechazarFacultad();
	public function obtenerIdEstadoProceso();
	
}
