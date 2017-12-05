<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Inscripcion;
use App\ProcesoAdmision;
use App\EstadosProcesoAdmisionEnum;
use App\SiupProgramas;
use App\VParametros;
use Mail;
use Carbon\Carbon;
use App\HistoricosProcesoAdmision;
use Auth;
use Validator;
use Response;


class ConfirmacionController extends Controller
{
    
	
    public function enviar(Request $request)
    {
		
		return view('confirmacion.confirmation');
    }
	
	
	
	
	
	}
