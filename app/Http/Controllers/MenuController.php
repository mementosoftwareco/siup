<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use View;
use Validator;
use Session;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Input;

class MenuController extends Controller


{
	
	
    public function menu()
	{
		//$this->middleware('auth');
		
		$perfil = Auth::user()->getNombrePerfil();

		
		if ( $perfil === 'Administrador' )
         return View::make('menus.administrador');
	 
	    if ( $perfil === 'Operador' )
         return View::make('menus.inscripcion');
	 
		if ( $perfil === 'Call Center' )
		 return View::make('menus.inscripcion');
	 
		if ( $perfil === 'Comercial' )
         return View::make('menus.inscripcion');
	}

	
	
	
	
}
