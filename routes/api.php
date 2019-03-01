<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    return 'Ciao Classe 3';
});

// middleware('api.auth')->
//Products Routes
Route::namespace('Api')->group(function() {
    Route::get('/products', 'ProductController@index');
    Route::post('/products', 'ProductController@create');
    Route::get('/products/{id}', 'ProductController@show');
    Route::post('/products/{id}', 'ProductController@update');
    Route::post('/products/{id}/delete', 'ProductController@destroy');

    Route::get('/categories','CategoryController@index');
    Route::post('/categories','CategoryController@create');
    Route::post('/categories/{id}/delete','CategoryController@destroy');
    Route::get('/categories/{id}','CategoryController@show');
});
