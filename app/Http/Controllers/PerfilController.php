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
use Illuminate\Support\Facades\Input;

class PerfilController extends Controller
{
    public function nuevoPerfil()
	{
		// get all the perfiles
		$perfiles = Perfil::all();		
		return View::make('perfiles.index')
			->with('perfiles', $perfiles);
	}
	
	public function editarPerfil($id)
	{
		// get all the perfiles
		$perfil = Perfil::find($id);		
		return View::make('perfiles.edit')
			->with('perfil', $perfil);
	}
	
	public function prepararEliminarPerfil($id)
	{
		// get all the perfiles
		$perfil = Perfil::find($id);		
		return View::make('perfiles.delete')
			->with('perfil', $perfil);
	}
	
	
	public function actualizarPerfil($id)
	{
		$rules = array(
        'nombre'       => 'required',
        'descripcion'      => 'required'
		);
		// store
		$perfil = Perfil::find($id);
		$perfil->nombre = Input::get('nombre');
		$perfil->descripcion = Input::get('descripcion');
		$perfil->save();
	
	
		return Redirect::to('nuevoPerfil');
	}
	
	
	public function eliminarPerfil($id)
	{
		
		// store
		$perfil = Perfil::find($id);
		
		$perfil->delete();
	
	
		return Redirect::to('nuevoPerfil');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/perfiles/create.blade.php)
		return View::make('perfiles.create');
	}
	
	
		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function guardarPerfil()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'nombre'       => 'required',
			'descripcion'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('perfiles/create')
				->withErrors($validator);
				
		} else {
			// store
			$perfil = new Perfil;
			$perfil->nombre       = Input::get('nombre');
			$perfil->descripcion      = Input::get('descripcion');	
			$perfil->save();

			// redirect
			Session::flash('message', 'Perfil creado correctamente');
			return Redirect::to('nuevoPerfil');
		}
	}
	
	
	
	
}
