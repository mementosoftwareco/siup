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
    })->name('/')->middleware('guest');

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
	
	Route::get('/nuevoPerfil', 'PerfilController@nuevoPerfil')->name('nuevoPerfil')->middleware('auth');
    Route::post('/guardarPerfil', 'PerfilController@guardarPerfil')->middleware('auth');
	Route::get('/editarPerfil/{id}', ['uses' =>'PerfilController@editarPerfil'])->name('editarPerfil')->middleware('auth');
	Route::post('/actualizarPerfil/{id}', ['uses' =>'PerfilController@actualizarPerfil'])->name('actualizarPerfil')->middleware('auth');
    Route::get('/prepararEliminarPerfil/{id}', ['uses' =>'PerfilController@prepararEliminarPerfil']) ->name('prepararEliminarPerfil')->middleware('auth');
	Route::post('/eliminarPerfil/{id}', ['uses' =>'PerfilController@eliminarPerfil']) ->name('eliminarPerfil')->middleware('auth');

	
   /* Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');*/
	
	Route::get('/preinscripcion', 'PreinscripcionController@index')->name('preinscripcion');
	Route::get('/terminos', 'PreinscripcionController@terms')->name('terminos');
	Route::post('/preinscripcion', 'PreinscripcionController@store');
	Route::get('ajax-programa/{idTipoPrograma}', 'PreinscripcionController@ajaxPrograma');
	
	Route::get('/inscripcion.list/', 'InscripcionController@listProcesos')->name('inscripcion.list')->middleware('auth');
	Route::get('/inscripcion/{procesoAdmon}', 'InscripcionController@index')->middleware('auth');
	Route::post('/inscripcion/{procesoAdmon}', 'InscripcionController@store')->name('inscripcion')->middleware('auth');
	Route::get('/buscarAspirante/', 'InscripcionController@buscarAspirante')->name('buscarAspirante')->middleware('auth');
	Route::post('/asignarAspirante/{procesoAdmon}', 'InscripcionController@asignarAspirante')->name('asignarAspirante')->middleware('auth');
	Route::post('/enviarValidacionComercial/', 'InscripcionController@enviarValidacionComercial')->name('enviarValidacionComercial')->middleware('auth');
	Route::get('ajax-ciudad/{id}', 'InscripcionController@ajaxDeptoCiudad');
	Route::get('ajax-municipio/{id}', 'InscripcionController@ajaxCiudadMunicipio');
	
	
	Route::get('/cargarMisProcesosAdmision/', 'HistoricoController@cargarMisProcesosAdmision')->name('cargarMisProcesosAdmision')->middleware('auth');
	Route::post('/mostrarHistorico/{procesoAdmon}', 'HistoricoController@mostrarHistorico')->name('mostrarHistorico')->middleware('auth');
	Route::get('/mostrarHistoricoGet/{procesoAdmon}', 'HistoricoController@mostrarHistorico')->name('mostrarHistorico')->middleware('auth');
	
	

	Route::get('/prepararCargaDocumentos/{idProceso}', 'DocumentosController@prepararCargaDocumentos')->name('prepararCargaDocumentos')->middleware('auth');
	Route::get('/prepararCargaDocumentosP/{idProceso}', 'DocumentosController@prepararCargaDocumentosP')->name('prepararCargaDocumentosP');
	Route::post('/cargarDocumentos', 'DocumentosController@cargarDocumentos')->name('cargarDocumentos');

	Route::get('/mostrarDocumento/{idCiphered}', ['uses' =>'DocumentosController@mostrarDocumento']) ->name('mostrarDocumento');

	

	//rutas para administració® ¤e registros
	Route::get('/nuevoRegistro', 'RegistroController@nuevoRegistro')->name('nuevoRegistro');	
	Route::post('/guardarRegistro', 'RegistroController@guardarRegistro');		
	Route::get('/editarRegistro/{id}', ['uses' =>'RegistroController@editarRegistro']) ->name('editarRegistro');
	Route::post('/actualizarRegistro/{id}', ['uses' =>'RegistroController@actualizarRegistro'])->name('actualizarRegistro');
	Route::get('/prepararEliminarRegistro/{id}', ['uses' =>'RegistroController@prepararEliminarRegistro'])->name('prepararEliminarRegistro');
	Route::post('/eliminarRegistro', 'RegistroController@eliminarRegistro') ->name('eliminarRegistro');
	
	
	//Rutas para entrevista

	Route::get('/entrevista/{procesoAdmon}', 'EntrevistaController@indexCiphered');
	Route::get('/ver.entrevista/{procesoAdmon}', 'EntrevistaController@index')->middleware('auth');
	Route::post('/evaluarEntrevista/{procesoAdmon}', 'EntrevistaController@evaluarEntrevista')->name('evaluarEntrevista')->middleware('auth');
	Route::post('/aprobarEntrevista', 'EntrevistaController@aprobarEntrevista')->name('aprobarEntrevista')->middleware('auth');
	Route::post('/rechazarEntrevista', 'EntrevistaController@rechazarEntrevista')->name('rechazarEntrevista')->middleware('auth');
	Route::post('/entrevista/{procesoAdmon}', 'EntrevistaController@store')->name('entrevista');

	Route::get('/listarEntrevistas/', 'EntrevistaController@listarEntrevistas')->name('listarEntrevistas')->middleware('auth');
	

		//Rutas para lider

	Route::get('/lc.inscripcion.list/', 'LiderComercialController@listProcesos')->name('lc.inscripcion.list')->middleware('auth');
	Route::get('/lc.inscripcion/{procesoAdmon}', 'LiderComercialController@index')->name('lc.inscripcion')->middleware('auth');
	Route::get('/lc.buscarAspirante/', 'LiderComercialController@buscarAspirante')->name('lc.buscarAspirante')->middleware('auth');
	Route::post('/lc.aprobar.proceso/', 'LiderComercialController@aprobarProceso')->name('lc.aprobar.proceso')->middleware('auth');
	Route::post('/lc.rechazar.proceso/', 'LiderComercialController@rechazarProceso')->name('lc.rechazar.proceso')->middleware('auth');
	
	
	//Rutas para admisiones
	Route::post('/admitirAspirante', 'AdmisionesController@admitirAspirante')->name('admitirAspirante')->middleware('auth');
	Route::get('/listarAspirantes/', 'AdmisionesController@listarAspirantes')->name('listarAspirantes')->middleware('auth');
	Route::auth();
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
