<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

/*Login rutes*/ 
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


/* Home rutes */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::patch('/datas/{data}', 'DataController@update')->name('datas.update');

/* Vista Sobre  EADIC rutes */

Route::get('/sobre-eadic', 'HomeController@sobre')->name('home');

/*Completa tus datos rutes */

Route::get('/completa-tus-datos', 'HomeController@index')->name('home');

/* Perfil rutes*/

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::patch('/profile/{data}', 'DataController@updatefoto')->name('profiles.updatefoto');

/* Finaliza rutes*/

Route::get('/finaliza', 'EndController@index')->name('finaliza');
Route::patch('/finaliza/{data}', 'EndController@update')->name('finalizas.updatefinaliza');
Route::resource('/admin/files', 'FileController')->names('admin.files');


/* Formaliza rutes*/

Route::get('/formaliza', 'HomeController@formaliza')->name('formaliza');

/* Resumen rutes*/

Route::get('/resumen', 'StepController@index')->name('resumen');

/* Master rutes  */

Route::get('/master/{codigo}', 'MasterController@index')->name('master');
Route::resource('/masters', 'MasterController')->names('masters');
Route::get('/masters', 'MasterController@indexAdmin')->name('masters');



/* Diagnostico rutes  */

Route::get('/diagnostico', 'DiagnosticoController@index')->name('diagnostico');
Route::get('/diagnostico/{id}', 'DiagnosticoController@update')->name('diagnostico.update');


// Calendar routes
Route::get('asesoria-personalizada', 'CalendarController@index')->name('cita.index');
Route::post('asesoria-personalizada', 'CalendarController@store')->name('cita.store');
Route::post('asesoria-personalizada/update/{id}', 'CalendarController@storeAdmin')->name('cita.storeAdmin');
Route::patch('asesoria-personalizada/update/{id}', 'CalendarController@update')->name('cita.update');
Route::delete('asesoria-personalizada/destroy/{id}', 'CalendarController@destroy')->name('cita.destroy');


// Módule User Routes
Route::resource('/usuarios', 'UserController')->names('usuarios')->middleware('auth');

// Módule Register Routes
Route::resource('/registros', 'RegisterController')->names('registros')->middleware('auth');
Route::post('registros/destroy/{id}', 'RegisterController@destroy')->name('registros.destroy');


/* Borrar cache */ 

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode2 = Artisan::call('cache:clear');
    $exitCode3 = Artisan::call('key:generate');
});
