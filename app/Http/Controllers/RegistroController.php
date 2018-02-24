<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Usuario;
use App\User;
use App\Nodo;
use App\Convenio;
use App\Facultad;
use App\Http\Controllers\InscripcionController;
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
		$listadoNodos = Nodo::where('1', '=', '1')->orderBy('nombre')->pluck('nombre', 'id_nodo');
		$listadoFacultades = Facultad::where('1', '=', '1')->orderBy('nombre')->pluck('nombre', 'id_facultad');
		$listadoConvenios = [];
		return View::make('auth.register')
			->with('users', $users)
			->with('perfiles', $perfiles)
			->with('listadoNodos', $listadoNodos)
			->with('listadoConvenios', $listadoConvenios)
			->with('listadoFacultades', $listadoFacultades);
			
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
			'email'      => 'required',
			'perfil'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		
		
		// process the login
		if ($validator->fails()) {
			return redirect('/nuevoRegistro')
				->withErrors($validator);
				
		}
		
		//Si el perfil es de operador == 2, callcenter == 3 o comercial == 4, se debe validar que se seleccione nodo y convenio
		if($request->perfil == 2){
			$this->validate($request, [
			'nodo' => 'required|max:10',
			'convenio' => 'required|max:10',
			]);
		}
		
		//Si el perfil es de facultad == 42
		if($request->perfil == 42){
			$this->validate($request, [
			'facultad' => 'required|max:10',
			]);
		}
		
			
		$id_user = User::create([
		'name' => Input::get('name'),
		'email' => Input::get('email'),
		'password' => bcrypt(Str::random(10)),
		'state' => 'ACT',
		'id_perfil' => Input::get('perfil'),
		'id_nodo' => Input::get('nodo'),
		'id_convenio' => Input::get('convenio'),
		'id_facultad' => Input::get('facultad'),
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
