<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::resource('/','UsuariosController');

Route::resource('home','HomeController');
*/
/*
Route::get('/a', function () {
    return view('layouts.dashboard');
});
*/
//Route::get('a', 'UsuariosController@index');
//Route::post('b', 'UsuariosController@store');


//Route::get('/', 'ClienteController@index')->name('/');
Route::resource('/','UsuariosController');
Route::resource('home','HomeController');
Route::get('cliente.ver', 'ClienteController@ver')->name('cliente.ver');
Route::get('cliente.listar', 'ClienteController@listar')->name('cliente.listar');
Route::get('cliente.nuevo', 'ClienteController@nuevo')->name('cliente.nuevo');
Route::post('cliente.registrar', 'ClienteController@registrar')->name('cliente.registrar');
Route::get('cliente.edita', 'ClienteController@edita')->name('cliente.edita');
Route::post('cliente.editar', 'ClienteController@editar')->name('cliente.editar');
Route::get('cliente.cambia_estado', 'ClienteController@cambia_estado')->name('cliente.cambia_estado');




