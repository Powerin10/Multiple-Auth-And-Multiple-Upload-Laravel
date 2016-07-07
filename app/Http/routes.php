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

//user register way
Route::get('register', 'AuthRegister@ShowForm');
Route::post('register', 'AuthRegister@register');

//multiple login
Route::get('login', 'AuthLogin@ShowForm');
Route::post('login', 'AuthLogin@login');
Route::get('logout', 'AuthLogin@logout');
Route::get('hello', 'AuthLogin@hello');


//articale resource
Route::resource('articale', 'ArticaleController');

Route::get('/', function () {
    return view('welcome');
});
