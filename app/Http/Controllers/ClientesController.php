<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function listarClientes()
    {
        echo "listando";
    }

    public function listarCliente($id)
    {
        echo "Listando Cliente";
    }

    public function cadastrarCliente(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:8',
            'telefone' => 'required',
            'cargo' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'produtos' => 'required',
        ]);

    }

    public function alterarCliente($id)
    {
        echo "Alterando";
    }

    public function deletarCliente($id)
    {
        echo "Deletando";
    }

    public function paginaCadastroCliente()
    {
        return view('/Clientes/cadastro');
    }

}
