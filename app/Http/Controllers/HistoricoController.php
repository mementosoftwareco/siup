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
use App\User;
use Auth;

class HistoricoController extends Controller
{
    public function cargarMisProcesosAdmision()
	{
		$procesosAdmon = ProcesoAdmision::where('id_usuario', '=', Auth::user()->id)->get();
		$identificacion = Input::get('identificacion');		
		$procesos = ProcesoAdmision::where('id_persona', '=', $identificacion)->get();
		
		
		$user = new User;
		$perfil = $user->obtenerNombrePerfil();

		if ( $perfil === 'Operador' || $perfil === 'Call Center' || $perfil === 'Comercial'){
         $breadcrumb='historicoComercial';
	 	}
		if ( $perfil === 'Líder Comercial' ){
         $breadcrumb='historicoValidacionComercial';
		}
		
		
		
		return View::make('historico.list')
			->with('procesosAdmon', $procesosAdmon)->with('procesos', $procesos)->with('breadcrumb', $breadcrumb);
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
