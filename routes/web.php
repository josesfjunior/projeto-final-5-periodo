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
    Route::get('/list/{id}', 'App\Http\Controllers\ClientesController@listarCliente')->name("listarCliente");
    Route::get('/cadastrar', 'App\Http\Controllers\ClientesController@paginaCadastroCliente')->name("paginaCadastrarCliente");
    Route::post('/cadastrar', 'App\Http\Controllers\ClientesController@cadastrarCliente')->name("cadastrarCliente");
    Route::put('/update/{id}', 'App\Http\Controllers\ClientesController@alterarCliente')->name("alterarCliente");
    Route::delete('/exclude/{id}', 'App\Http\Controllers\ClientesController@deletarCliente')->name("deletarCliente");
});

Route::group(['prefix' => '/funcionarios'], function () {
    Route::get('/login', 'App\Http\Controllers\FuncionariosController@paginaLoginFuncionario')->name("paginaLogin");
    Route::get('/cadastrar', 'App\Http\Controllers\FuncionariosController@paginaCadastroFuncionario')->name("paginaCadastro");
    Route::get('/listar', 'App\Http\Controllers\FuncionariosController@listarFuncionarios')->name("listarFuncionarios");
    Route::get('/listar/{id}', 'App\Http\Controllers\FuncionariosController@listarFuncionario')->name("listarFuncionario");
    Route::post('/cadastrar', 'App\Http\Controllers\FuncionariosController@cadastrarFuncionario')->name("cadastrarFuncionario");
    Route::post('/login', 'App\Http\Controllers\FuncionariosController@autenticarFuncionario')->name("autenticarFuncionario");
    Route::put('/{id}', 'App\Http\Controllers\FuncionariosController@alterarFuncionario')->name("alterarFuncionario");
    Route::delete('/{id}', 'App\Http\Controllers\FuncionariosController@deletarFuncionario')->name("deletarFuncionario");
});

Route::get("/dashboard", function (){
    if(session()->get('autenticado') == 'ok'){
        return view('Dashboard/dashboard');
    } else {
        return redirect()->route("paginaLogin");
    }
})->name('dashboard');

Route::group(['prefix' => '/produtos'], function (){
    Route::get('/', 'App\Http\Controllers\ProdutosController@paginaProdutos');
       Route::get('/cadastro', 'App\Http\Controllers\ProdutosController@paginaCadastroProduto')->name("paginaCadastroProduto");
       Route::get('/dashboard', 'App\Http\Controllers\ProdutosController@dashboardProdutos')->name("dashboardProdutos");
       Route::post('/cadastrar', 'App\Http\Controllers\ProdutosController@cadastrarProduto');
       Route::post('/deletar', 'App\Http\Controllers\ProdutosController@deletarProduto')->name("deletarProduto");

});


Route::get('/about', function () {
    return view('about');
});
