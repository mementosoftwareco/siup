<?php

namespace App;


abstract class EstadosProcesoAdmisionEnum
{
	const PreInscrito = 1;	    
	const PreInscritoFormularioInscripción = 2;	    
	const PreInscritoDocumentos = 3;	    
	const PendienteValidaciónInscripción= 4;    
	const InscritoPendienteValidaciónComercial= 5;	    
	const InscritoPendienteEntrevista= 6;	    
	const PendienteValidaciónEntrevista= 7;	    
	const RechazadoPorInscripción= 8;	    
	const RechazadoPorDocumentos= 9;   
	const RechazadoPorEntrevista= 10;	
	const RechazadoPorAdmisión= 11;	
	const ValidadoLiderComercial= 12;	
	const ValidadoFacultad= 13;	
	const Admitido= 14;
	
}
