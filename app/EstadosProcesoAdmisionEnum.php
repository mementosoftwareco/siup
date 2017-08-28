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
	const Inscrito= 7;	
	const PendienteValidacionEntrevista= 8;	    
	const RechazadoPorInscripcion= 9;	    
	const RechazadoPorDocumentos= 10;   
	const RechazadoPorEntrevista= 11;	
	const RechazadoPorAdmision= 12;	
	const ValidadoLiderComercial= 13;	
	const ValidadoFacultad= 14;	
	const Validado=15;
	const Admitido= 16;
	
	public function calcularProximoEstadoProceso(ProcesoAdmision $procesoAdmon, $estadoAccionActual){
		
		$historicoProcesos = App\HistoricosProcesoAdmision::where('id_proceso_admon', $procesoAdmon->id_proceso_admon)
               ->orderBy('created_at', 'desc')
               ->take(10)
               ->get();
		
	}
	
}
