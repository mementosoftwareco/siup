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
use Illuminate\Support\Facades\Input;

class RegistroController extends Controller
{
    public function nuevoRegistro()
	{
		$users = User::all();
		$perfiles = Perfil::lists('nombre','id');
	
		return View::make('auth.register')
			->with('users', $users)
			->with('perfiles', $perfiles);
			
	}

	
	
	
	public function editarRegistro($id)
	{
		$user = User::find($id);
	
		return View::make('auth.edit')
			->with('user', $user);
			
	}

	
	
		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function guardarRegistro()
	{
		
		
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required',
			'contrasenia'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		
		
		// process the login
		/*if ($validator->fails()) {
			return redirect('auth.register')
				->withErrors($validator);
				
		} else {*/
		
		
			
			$id_user = User::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => bcrypt(Input::get('contrasenia')),
			'state' => 'ACT',
			'id_perfil' => Input::get('nombre'),
			
			]);
			
			
			Session::flash('message', 'Usuario registrado correctamente');
		
			return redirect('/nuevoRegistro');			
			
		//}
	}
	
	
	
	
}
