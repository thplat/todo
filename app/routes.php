<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TodoController@getIndex');
Route::get('task/new', 'TodoController@getCreate');
Route::post('task/new', 'TodoController@postCreate');

Route::get('task/{id}/edit', 'TodoController@getEdit');
Route::post('task/{id}/edit', 'TodoController@postEdit');
Route::get('task/{id}/delete', 'TodoController@getDelete');
Route::get('task/{id}/check', 'TodoController@changeStatus');

Route::get('rb', function(){

	return Redirect::back();

});