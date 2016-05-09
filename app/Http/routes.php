<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::get('login', 'Auth\AuthController@getLogin');

Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@logout');

Route::get('password/reset', 'Auth\PasswordController@getEmail');

Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');

Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('home', 'HomeController@index');

Route::resource('tblPaises', 'TblPaisesController');

Route::resource('tblBancos', 'TblBancosController');

Route::resource('tblDocumentos', 'TblDocumentosController');

Route::resource('tblExperiencias', 'TblExperienciaController');

Route::resource('tblCategorias', 'TblCategoriasController');

Route::resource('tblPalabras', 'TblPalabrasController');

Route::resource('tblMascaras', 'TblMascaraController');

Route::resource('tblMonedas', 'TblMonedasController');

Route::resource('tblTitulos', 'TblTitulosController');

Route::resource('tblSubCategorias', 'TblSubCategoriasController');

Route::resource('tblDuracions', 'TblDuracionController');

Route::resource('tblSanciones', 'TblSancionesController');

Route::resource('tblTelefonotipos', 'TblTelefonotipoController');

Route::resource('tblPlanes', 'TblPlanesController');

Route::resource('tblTipousuarios', 'TblTipousuarioController');

Route::resource('tblEspecialidads', 'TblEspecialidadController');

Route::resource('tblEspecialidads', 'TblEspecialidadController');

Route::resource('tblTipoInstrumentos', 'TblTipoInstrumentoController');

Route::resource('tblStatusproyectos', 'TblStatusproyectoController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('register', 'userController');

Route::resource('registeru', 'userController@create');

Route::get('getdocumentos/{id}/{id1}','userController@getdocumentos');

Route::resource('tblCategoriaemps', 'tblCategoriaempController');

Route::resource('tblCodpais', 'tblCodpaisController');