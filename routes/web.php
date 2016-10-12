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
    return view('auth/login');
});

//Log
Auth::routes();
Route::get('/confirm/{id}/{token}', ('Auth\RegisterController@confirm'));

//Log with Facebook
Route::get('/facebook', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'deck'], function(){
   Route::get('/list/{class}', 'DeckController@toList')->name('deck.list');
   Route::get('/class-list/{class}/{mode}', 'DeckController@listClassJson')->name('deck.classlist');
   Route::get('/neutral-list', 'DeckController@listNeutralJson')->name('deck.neutrallist');
   Route::post('/save', 'DeckController@save')->name('deck.save');
});
