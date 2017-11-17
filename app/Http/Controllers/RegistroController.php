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
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;

class RegistroController extends Controller
{
    use ResetsPasswords;
	
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
		$estadoUsuario = $user->state;
		return View::make('auth.edit')
			->with(['user' => $user]);
			
	}
	
	/**
	Acción para guardar los datos de un usuario actualizados
	*/
	public function actualizarRegistro($id, Request $request)
	{
		$user = User::find($id);
		
		$rules = array(
			'name'       => 'required',
			'state'=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
				
		if ($validator->fails()) {
			return redirect('/editarRegistro/'.$id)
				->withErrors($validator);
		}
		
		$user->name = $request['name'];
		$user->state = $request['state'];
		
		$user->save();
	
		return $this->nuevoRegistro();
			
	}
	
	public function prepararEliminarRegistro($id)
	{
		// get all the perfiles
		$user = User::find($id);		
		return View::make('auth.delete')
			->with('user', $user);
	}
	

	
	
		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function guardarRegistro(Request $request)
	{
		
		
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		
		
		// process the login
		if ($validator->fails()) {
			return redirect('/nuevoRegistro')
				->withErrors($validator);
				
		}
		
			
		$id_user = User::create([
		'name' => Input::get('name'),
		'email' => Input::get('email'),
		'password' => bcrypt(Str::random(10)),
		'state' => 'ACT',
		'id_perfil' => Input::get('perfil'),
		
		]);
		
		
		Session::flash('message', 'Usuario registrado correctamente');
	
		return $this->sendResetLinkEmail($request);
		
			//return redirect('/nuevoRegistro');
			
		//}
	}
	
	protected function getEmailSubject()
    {
        return property_exists($this, 'subject') ? $this->subject : 'Bienvenido a SIUP, Sistema de Inscripción universitaria de la IBERO';
    }
	
	
}
