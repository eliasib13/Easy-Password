<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'WelcomeController@index');
Route::post('/doLogin', 'WelcomeController@doLogin');
Route::get('/doLogout', 'WelcomeController@doLogout');

Route::get('/home', 'HomeController@index')->middleware('isLogged');