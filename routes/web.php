<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/login','Admin\LoginController@view');
Route::post('/admin/login','Admin\LoginController@login');

Route::get('/admin/dashboard','Admin\DashboardController@dashboard');

//feedback
Route::get('/admin/feedbacks','Admin\FeedbackController@listar');
Route::get('/admin/feedback/{id}','Admin\FeedbackController@index');
//fim feedback

//usuario
Route::get('/admin/usuarios','Admin\UsuarioController@listar');
Route::get('/admin/usuario/{id}','Admin\UsuarioController@usuario');
Route::get('/admin/cadastrar/usuario','Admin\UsuarioController@cadastrar');
Route::post('/admin/cadastrar/usuario','Admin\UsuarioController@cadastrar');
Route::post('/admin/alterar/usuario/{id}','Admin\UsuarioController@alterar');
Route::get('/admin/usuario/ativar/{id}','Admin\UsuarioController@listar');
Route::get('/admin/usuario/desativar/{id}','Admin\UsuarioController@listar');

// fim usuario

//localizacao
Route::get('/admin/cadastrar/localizacao','Admin\LocalizacaoController@cadastrar');
Route::post('/admin/cadastrar/localizacao','Admin\LocalizacaoController@cadastrar');
Route::get('/admin/localizacoes','Admin\LocalizacaoController@listar');
Route::get('/admin/localizacoes/pendentes','Admin\LocalizacaoController@pendetes');
Route::get('/admin/localizacao/{id}','Admin\LocalizacaoController@localizacao');
Route::post('/admin/alterar/localizacao/{id}','Admin\LocalizacaoController@alterar');
//fim localizacao

// admin
Route::get('/admin/listar','Admin\AdminController@listar');
Route::get('/admin/cadastrar','Admin\AdminController@cadastrarView');
Route::post('/admin/cadastrar','Admin\AdminController@cadastrar');
Route::get('/admin/{id}','Admin\AdminController@admin');
Route::get('/admin/alterar/{id}','Admin\AdminController@alterar');
Route::get('/admin/desativar/{id}','Admin\AdminController@desativar');
Route::get('/admin/ativar/{id}','Admin\AdminController@ativar');

//fim admin


Route::get('/teste/{id}','teste@teste');