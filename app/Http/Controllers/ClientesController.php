<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function listarClientes(){
        return view('/Clientes/cadastro');
    }

    public function listarCliente($id){
        echo "Listando Cliente";
    }

    public function cadastrarCliente(){
        echo "Cadastrando";
    }

    public function alterarCliente($id){
        echo "Alterando";
    }

    public function deletarCliente($id){
        echo "Deletando";
    }


}
