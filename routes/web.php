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
    return view('pages.home');
});

Auth::routes();

Route::resource('flyers', 'FlyersController');

Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos',['as' => 'store_photo_path', 'uses' =>  'FlyersController@addPhoto']);

