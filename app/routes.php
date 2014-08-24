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

/*Route::get('/', array('as' => 'usuarios', 'uses' => 'UsuariosController@index')); 

Route::group(array('/'), function()
{
	Route::resource('usuarios', 'UsuariosController');
} );*/


Route::controller('/', 'UsersController');