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
	Route::get('/help', 'DashboardController@help')->name('help');	

	//rotas de pedido
	Route::get('/', 'PedidoController@index')->name('pedidos');
	Route::get('/arquivo', 'PedidoController@archive')->name('pedidos-arquivados');
	Route::get('/pedido/{id}', 'PedidoController@show')->name('pedido');
	Route::delete('/pedido/{id}', 'PedidoController@destroy')->name('pedido-delete');
	Route::patch('/pedido/{id}', 'PedidoController@restore')->name('pedido-restore');

	//rotas nota fiscal
	Route::get('/notas-fiscais/{pedido}-{entrega}', 'NFController@show')->name('notas-fiscais');
	Route::get('/notas-fiscais/{pedido}', 'NFController@show')->name('notas-fiscais-pedido');

});

Route::post('/pedido/create', 'PedidoController@create')->name('pedido-create');
Route::post('/notafiscal/create', 'NFController@create')->name('nota-fiscal-create');