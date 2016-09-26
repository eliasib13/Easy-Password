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
Route::post('/addUser', 'WelcomeController@addUser');

Route::get('/home', 'HomeController@index')->middleware('isLogged');
Route::post('/addPassword', 'HomeController@addPassword')->middleware('isLogged');


Route::group(['prefix' => 'api'], function() {
    Route::post('register/update', 'ApiController@updateRegister');
    Route::delete('register/delete', 'ApiController@deleteRegister');
    Route::get('test', function() {return 'test';});
});
