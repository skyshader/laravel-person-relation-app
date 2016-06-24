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

Route::get('/', 'HomeController@index');

Route::get('/users', 'UserController@index');
Route::post('/user', 'UserController@store');
Route::get('/user/{user}/relatives', 'UserController@relatives');
Route::put('/user/{user}/relative', 'UserController@createRelative');

Route::post('/tag', 'TagController@store');
Route::put('/tag/{tag}', 'TagController@update');
