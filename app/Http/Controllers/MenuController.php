<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Usuario;
use App\User;
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
		$user = new User;
		$perfil = $user->obtenerNombrePerfil();

		
		if ( $perfil === 'Administrador' )
         return View::make('menus.administrador');
	 
	    if ( $perfil === 'Operador' )
         return View::make('menus.operador');
	 
		if ( $perfil === 'Call Center' )
		 return View::make('menus.callcenter');
	 
		if ( $perfil === 'Comercial' )
         return View::make('menus.comercial');
	 
		if ( $perfil === 'Facultad' )
         return View::make('menus.facultad');
	 
		if ( $perfil === 'Admisiones' )
         return View::make('menus.admisiones');
	 
		if ( $perfil === 'Líder Comercial' )
         return View::make('menus.liderComercial');
	}

	
	
	
	
}
