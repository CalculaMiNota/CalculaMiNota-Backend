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

Route::post('/api/usuarios/registro', 'usuario@store');
Route::get('/api/usuarios/all', 'usuario@test');
Route::get('/api/usuarios/exists', 'usuario@exists');


Route::get('/', function () {
    return view('welcome');
});
