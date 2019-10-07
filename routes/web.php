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

Route::group(['middleware'=>'auth'],function(){

	Route::get('/',                    	['as'=>'cliente.home', 'uses'=>'ClientesController@index']);
	Route::post('/cliente/salvar',     	['as'=>'cliente.salvar',    'uses'=>'ClientesController@salvar']);
	Route::get('/cliente/editar/{id}',  ['as'=>'cliente.editar',    'uses'=>'ClientesController@editar']);
	Route::get('/cliente/deletar{id}',  ['as'=>'cliente.deletar',    'uses'=>'ClientesController@deletar']);

	Route::get('/{cliente}/home',                	['as'=>'link.home', 	'uses'=>'LinksController@index']);
	Route::post('/{cliente}/link/salvar',     	['as'=>'link.salvar',   'uses'=>'LinksController@salvar']);
	Route::get('/{cliente}/link/editar/{id}', 	['as'=>'link.editar',   'uses'=>'LinksController@editar']);
	Route::get('/{cliente}/link/deletar/{id}',  ['as'=>'link.deletar',  'uses'=>'LinksController@deletar']);
	Route::get('/{cliente}/{id}',  				['as'=>'link.acesso',  'uses'=>'LinksController@acesso']);

	Route::get('/usuario/',         	                ['as'=>'usuario.home',        'uses'=>'LoginController@index']);
	Route::get('/usuario/adicionar/',                   ['as'=>'usuario.adicionar',   'uses'=>'LoginController@adicionar']);
	Route::post('/usuario/salvar',                      ['as'=>'usuario.salvar',      'uses'=>'LoginController@salvar']);
	Route::get('/usuario/editar/{id}',                  ['as'=>'usuario.editar',      'uses'=>'LoginController@editar']);
	Route::put('/usuario/atualizar/{id}',               ['as'=>'usuario.atualizar',   'uses'=>'LoginController@atualizar']);
	Route::get('/usuario/deletar/{id}',                 ['as'=>'usuario.deletar',     'uses'=>'LoginController@deletar']);
	Route::post('/usuario/perfil/alterar_senha',   ['as'=>'usuario.alterarsenha','uses'=>'LoginController@alterarsenha']);
	Route::get('/usuario/perfil/senha',   				['as'=>'usuario.senha','uses'=>'LoginController@senha']);

Auth::routes();
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/sair',                           	['as'=>'login.sair','uses'=>'LoginController@sair']);