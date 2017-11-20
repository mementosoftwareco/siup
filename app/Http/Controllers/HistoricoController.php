<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Persona;
use App\Inscripcion;
use View;
use Validator;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\ProcesoAdmision;
use App\HistoricosProcesoAdmision;
use Auth;

class HistoricoController extends Controller
{
    public function cargarMisProcesosAdmision()
	{
		$procesosAdmon = ProcesoAdmision::where('id_usuario', '=', Auth::user()->id)->get();
		
		return View::make('historico.list')
			->with('procesosAdmon', $procesosAdmon);
	}
	
	
	
	
	
	public function mostrarHistorico($idProceso)
	{
		
		$historicos =  HistoricosProcesoAdmision::where('id_proceso_admon', '=', $idProceso)->orderBy('CREATED_AT', 'DESC')->get();
		$proceso = ProcesoAdmision::findOrFail($idProceso);
		$persona = Persona::findOrFail($proceso -> id_persona);		
		$inscripcion =Inscripcion::findOrFail($proceso -> id_inscripcion);
		
		return View::make('historico.detail')
			->with('historicos', $historicos)->with('persona', $persona)->with('inscripcion', $inscripcion);
	}
	
	
	
	
	
	
	
	
}
