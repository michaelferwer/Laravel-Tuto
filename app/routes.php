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

Route::group(array('before' => 'guest'), function()
{
    Route::get('login', array('uses' => 'LoginController@index', 'as' => 'login'));

    Route::post('authentication',  'LoginController@authentication');
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('home', 'HomeController@index');

    Route::get('/', 'HomeController@index');
});



