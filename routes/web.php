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

use \App\RandomStringGenerator;

Route::get('/', 'WelcomeController@index');
Route::post('/doLogin', 'WelcomeController@doLogin');
Route::get('/doLogout', 'WelcomeController@doLogout');
Route::post('/addUser', 'WelcomeController@addUser');

Route::get('/home', 'HomeController@index')->middleware('isLogged');
Route::post('/addPassword', 'HomeController@addPassword')->middleware('isLogged');

Route::get('/random', function(\Illuminate\Http\Request $request) {
    $numbers = $request->input('numbers');
    $symbols = $request->input('symbols');
    $length =  $request->input('length');
    
    return RandomStringGenerator::generate([
        'numbers' => $numbers,
        'symbols' => $symbols,
        'length' => $length
    ]);
});


Route::group(['prefix' => 'api'], function() {
    Route::post('register/update', 'ApiController@updateRegister');
    Route::post('register/delete', 'ApiController@deleteRegister');
    Route::get('test', function() {return 'test';});
});
