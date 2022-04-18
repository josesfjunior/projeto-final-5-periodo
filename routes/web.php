<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/clientes'], function () {
    Route::get('/', 'App\Http\Controllers\ClientesController@listarClientes')->name("listarClientes");
    Route::get('/{id}', 'App\Http\Controllers\ClientesController@listarCliente')->name("listarCliente");
    Route::post('/', 'App\Http\Controllers\ClientesController@cadastrarCliente')->name("cadastrarCliente");
    Route::put('/{id}', 'App\Http\Controllers\ClientesController@alterarCliente')->name("alterarCliente");
    Route::delete('/{id}', 'App\Http\Controllers\ClientesController@deletarCliente')->name("deletarCliente");
});
