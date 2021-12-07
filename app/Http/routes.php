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
    return view('auth/login');
});
Route::get('/acerca', function () {
    return view('acerca');
});
Route::auth();
//RTUAS PRINCIPALES
Route::get('/home', 'HomeController@index');
//Route::get('/{slug?}', 'HomeController@index');
Route::resource('Actividades', 'ActividadesController');
Route::resource('Establecimiento', 'EstablecimientoController');
Route::resource('seguridad/usuario', 'UsuarioController');
Route::resource('Banco', 'BancoController');
Route::resource('CuentaPago', 'CuentaPagoController');


Route::get('reporteusuarios', 'UsuarioController@reporte');

//REPORTES GENERALES PDF
//Route::get('reportecategorias', 'CategoriaController@reporte');
