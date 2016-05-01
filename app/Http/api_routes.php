<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource('paises', 'paisesAPIController');

Route::resource('documentos', 'DocumentosAPIController');

Route::resource('documentos', 'DocumentosAPIController');

Route::resource('bancos', 'bancosAPIController');

Route::resource('experiencias', 'experienciaAPIController');

Route::resource('categorias', 'categoriasAPIController');

Route::resource('tblPaises', 'TblPaisesAPIController');