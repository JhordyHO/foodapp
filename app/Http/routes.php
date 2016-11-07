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


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/ListProducto', 'ProductController@ListP');
Route::get('/AddProducto', 'ProductController@create');
Route::get('/Admin', 'AdminController@index');
Route::get('/Config', 'AdminController@index');

Route::get('P/{categoria}/{producto}','ProductController@index');

Route::get('/interaction', 'InteractionController@ventas');
Route::resource('/product', 'ProductController');
Route::post('fileUpload', ['as'=>'fileUpload','uses'=>'AdminController@fileUpload']);