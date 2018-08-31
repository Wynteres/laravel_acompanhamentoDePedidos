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

date_default_timezone_set("America/Sao_Paulo");

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

	//Route::get('/', function () {
	//    return view('dashboard/dashboard_management');
	//});
	Route::get('/home', 'HomeController@index')->name('home');

	Route::redirect('/dashboard', '/', 301);
	// Route::get('/', 'DashboardController@index')->name('dashboard');	

	//rotas de pedido
	Route::get('/', 'PedidoController@index')->name('pedidos');
	Route::get('/arquivo', 'PedidoController@index')->name('pedidos-arquivados');
	Route::get('/pedido/{id}', 'PedidoController@show')->name('pedido');

});