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

Route::get('/', function () {
    return redirect('/files');
});

Route::group(['prefix' => 'files'], function()
{
	Route::controller('/user', 'FileuploadController');

	Route::controller('/file', 'FileController');
	
	Route::controller('/', 'Auth\AuthController');

});