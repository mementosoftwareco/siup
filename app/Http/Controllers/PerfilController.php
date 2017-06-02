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
    public function index()
	{
		// get all the perfiles
		$perfiles = Perfil::all();

		
		
		
		return View::make('perfiles.index')
			->with('perfiles', $perfiles);
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
	public function store()
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
			return Redirect::to('perfiles');
		}
	}
	
	
	
	
}
