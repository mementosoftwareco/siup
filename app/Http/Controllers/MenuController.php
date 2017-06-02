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
	
	protected $redirectTo = '/perfiles';
    public function menu()
	{
		$perfil = Auth::user()->getPerfil();

		
		if ( $perfil === 'Administrador' )
        return $redirect_to;
	}

	
	
	
	
}
