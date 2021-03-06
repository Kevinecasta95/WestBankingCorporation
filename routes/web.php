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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('clientes', 'Clientes\\ClientesController')->middleware('auth');
Route::resource('cuentas_bancarias', 'CuentasBancarias\\CuentasBancariasController')->middleware('auth');
Route::resource('transacciones', 'Transacciones\\TransaccionesController')->middleware('auth')->except(['create', 'store', 'edit', 'update', 'delete']);
Route::resource('depositos', 'Depositos\\DepositosController')->middleware('auth');
Route::resource('retiros', 'Retiros\\RetirosController')->middleware('auth');
Route::resource('cheques', 'Cheques\\ChequesController')->middleware('auth');