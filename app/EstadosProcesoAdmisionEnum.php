<?php

namespace App;

use App\ProcesoAdmision;
use App\HistoricosProcesoAdmision;

abstract class EstadosProcesoAdmisionEnum
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
	const Validado=14;
	const Admitido= 15;
	
	public function calcularProximoEstadoProceso(ProcesoAdmision $procesoAdmon, $estadoAccionActual){
		
		$historicoProcesos = App\HistoricosProcesoAdmision::where('id_proceso_admon', $procesoAdmon->id_proceso_admon)
               ->orderBy('created_at', 'desc')
               ->take(10)
               ->get();
		
	}
	
}
