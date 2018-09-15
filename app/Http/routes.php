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

// Authentication Routes...
Route::get('login', 'usuario@showLoginForm');
Route::post('login', 'usuario@login');
Route::post('api/usuarios/login', 'usuario@login');
Route::get('api/usuarios/isLogged', 'usuario@isLogged');

Route::get('logout', 'usuario@logout');

// Registration Routes...
Route::get('register', 'usuario@showRegistrationForm');
Route::post('register', 'usuario@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Route::auth();

//Route::get('/home', 'HomeController@index');
