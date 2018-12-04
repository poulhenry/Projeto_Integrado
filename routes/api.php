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
Route::post('/login','Admin\LoginController@login');
Route::post('/cadastrar','Cliente\UsuarioController@cadastrar');


Route::group(['middleware' => 'auth:api'], function(){

});
