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

Route::get('/', 'MamparaController@index')->name('index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/custom', function (){
    return view('custom');
})->name('custom');

Route::get('/añadirMampara', function (){
    return view('añadirMampara');
})->name('añadirMampara')->middleware('auth');

Route::post('/añadirMampara/guardar', 'MamparaController@store')->name('guardarMampara');

Route::get('/mampara/{id}', 'MamparaController@show')->name('detalleMampara');

Route::get('/filtroLateral/{tipo}', 'MamparaController@filtro')->name('filtroLateral');

Route::post('/mampara/{id}/añadirPregunta', 'PreguntaController@store')->name('añadirPregunta');

Route::post('/pregunta/responder/{id}', 'RespuestaController@store')->name('responderPregunta')->middleware('auth');

Route::get('/archivo/descargar/{id}', 'PreguntaController@show')->name('archivo.descargar');
