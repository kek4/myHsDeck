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

Route::get('/', function () {
    return view('welcome');
});

//Log
Auth::routes();
Route::get('/confirm/{id}/{token}', ('Auth\RegisterController@confirm'));

//Log with Facebook
Route::get('/facebook', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'deck'], function(){
   Route::get('/list', 'DeckController@toList')->name('deck.list');
   Route::get('/class-list/{class}/{mode}', 'DeckController@listJson')->name('deck.classlist');
});
