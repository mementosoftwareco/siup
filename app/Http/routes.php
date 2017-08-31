<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

	/*
	// Authentication Routes...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Registration Routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');
	
	*/
	
	Route::get('/menu', 'MenuController@menu') ->name('menu');
	
	
	//Rutas para administración de perfiles
	Route::get('/nuevoPerfil', 'PerfilController@nuevoPerfil');
    Route::post('/guardarPerfil', 'PerfilController@guardarPerfil');
	Route::get('/editarPerfil/{id}', ['uses' =>'PerfilController@editarPerfil'])->name('editarPerfil');
	Route::post('/actualizarPerfil/{id}', ['uses' =>'PerfilController@actualizarPerfil'])->name('actualizarPerfil');
    Route::get('/prepararEliminarPerfil/{id}', ['uses' =>'PerfilController@prepararEliminarPerfil']) ->name('prepararEliminarPerfil');
	Route::post('/eliminarPerfil/{id}', ['uses' =>'PerfilController@eliminarPerfil']) ->name('eliminarPerfil');

	
   /* Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');*/
	
	Route::get('/preinscripcion', 'PreinscripcionController@index');
	Route::post('/preinscripcion', 'PreinscripcionController@store');
	
	
	Route::get('/inscripcion.list/', 'InscripcionController@listProcesos');
	Route::get('/inscripcion/{procesoAdmon}', 'InscripcionController@index');
	Route::post('/inscripcion/{procesoAdmon}', 'InscripcionController@store')->name('inscripcion');
	Route::get('/buscarAspirante/', 'InscripcionController@buscarAspirante')->name('buscarAspirante');
	Route::post('/asignarAspirante/{procesoAdmon}', 'InscripcionController@asignarAspirante')->name('asignarAspirante');
	Route::post('/enviarValidacionComercial/{procesoAdmon}', 'InscripcionController@enviarValidacionComercial')->name('enviarValidacionComercial');
	Route::get('ajax-ciudad/{id}', 'InscripcionController@ajaxDeptoCiudad');
	Route::get('ajax-municipio/{id}', 'InscripcionController@ajaxCiudadMunicipio');
	
	
	Route::get('/cargarMisProcesosAdmision/', 'HistoricoController@cargarMisProcesosAdmision')->name('cargarMisProcesosAdmision');
	Route::post('/mostrarHistorico/{procesoAdmon}', 'HistoricoController@mostrarHistorico')->name('mostrarHistorico');
	
	
	Route::get('/prepararCargaDocumentos/{idProceso}', 'DocumentosController@prepararCargaDocumentos')->name('prepararCargaDocumentos');
	Route::get('/prepararCargaDocumentosP/{idProceso}', 'DocumentosController@prepararCargaDocumentosP')->name('prepararCargaDocumentosP');
	Route::post('/cargarDocumentos', 'DocumentosController@cargarDocumentos')->name('cargarDocumentos');
	Route::get('/mostrarDocumento/{id}', ['uses' =>'DocumentosController@mostrarDocumento']) ->name('mostrarDocumento');

	
		//rutas para administració® ¤e registros
	Route::get('/nuevoRegistro', 'RegistroController@nuevoRegistro');	
	Route::post('/guardarRegistro', 'RegistroController@guardarRegistro');		
	Route::get('/editarRegistro/{id}', ['uses' =>'RegistroController@editarRegistro']) ->name('editarRegistro');
	Route::post('/actualizarRegistro/{id}', ['uses' =>'RegistroController@actualizarRegistro'])->name('actualizarRegistro');
	Route::get('/prepararEliminarRegistro/{id}', ['uses' =>'RegistroController@prepararEliminarRegistro'])->name('prepararEliminarRegistro');
	Route::post('/eliminarRegistro', 'RegistroController@eliminarRegistro') ->name('eliminarRegistro');
	
	
	//Rutas para entrevista
	Route::get('/entrevista/{procesoAdmon}', 'EntrevistaController@indexCiphered');
	Route::get('/ver.entrevista/{procesoAdmon}', 'EntrevistaController@index');
	Route::post('/evaluarEntrevista/{procesoAdmon}', 'EntrevistaController@evaluarEntrevista')->name('evaluarEntrevista');
	Route::post('/aprobarEntrevista/{procesoAdmon}', 'EntrevistaController@aprobarEntrevista')->name('aprobarEntrevista');
	Route::post('/entrevista/{procesoAdmon}', 'EntrevistaController@store')->name('entrevista');
	Route::get('/listarEntrevistas/', 'EntrevistaController@listarEntrevistas')->name('listarEntrevistas');
	
	
//Rutas para lider comercial
	Route::get('/lc.inscripcion.list/', 'LiderComercialController@listProcesos');
	Route::get('/lc.inscripcion/{procesoAdmon}', 'LiderComercialController@index');
	Route::get('/lc.buscarAspirante/', 'LiderComercialController@buscarAspirante')->name('lc.buscarAspirante');
	Route::post('/lc.aprobar.proceso/', 'LiderComercialController@aprobarProceso')->name('lc.aprobar.proceso');
	Route::post('/lc.rechazar.proceso/', 'LiderComercialController@rechazarProceso')->name('lc.rechazar.proceso');
	


	//Rutas para admisiones
	//Route::get('/entrevista/{procesoAdmon}', 'EntrevistaController@index');
	//Route::post('/evaluarEntrevista/{procesoAdmon}', 'EntrevistaController@evaluarEntrevista')->name('evaluarEntrevista');
	//Route::post('/aprobarEntrevista/{procesoAdmon}', 'EntrevistaController@aprobarEntrevista')->name('aprobarEntrevista');
	Route::post('/admitirAspirante/{procesoAdmon}', 'AdmisionesController@admitirAspirante')->name('admitirAspirante');
	Route::get('/listarAspirantes/', 'AdmisionesController@listarAspirantes')->name('listarAspirantes');
	    Route::auth();

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
