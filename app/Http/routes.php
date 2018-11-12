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
Route::get('api/usuarios/logout', 'usuario@logout');
Route::post('api/usuarios/password/email', 'usuario@sendResetLinkEmail');
Route::get('logout', 'usuario@logout');
Route::get('api/usuarios/getUserInfo', 'usuario@getUserInfo');


// Registration Routes...
Route::get('register', 'usuario@showRegistrationForm');
Route::post('register', 'usuario@register');
Route::post('api/usuarios/register', 'usuario@register');

// Password Reset Routes...
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'usuario@sendResetLinkEmail');
// Route::post('password/reset', 'Auth\PasswordController@reset');

Route::post('api/password/reset', 'usuario@reset');

Route::get('api/cursos', 'CursoController@index');
Route::post('api/cursos', 'CursoController@store');
Route::post('api/cursos/delete', 'CursoController@remove');
Route::post('api/rubros/multiple', 'RubroController@storeMultiple');
Route::post('api/rubros', 'RubroController@store');
Route::post('api/rubros/delete', 'RubroController@delete');
Route::get('api/dashboard/data', 'CursoController@dashboardData');
//Route::auth();

//Route::get('/home', 'HomeController@index');
