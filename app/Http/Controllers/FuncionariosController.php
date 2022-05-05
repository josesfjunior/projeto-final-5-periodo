<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class FuncionariosController extends Controller
{
    public function listarFuncionarios()
    {
        echo "Listando Funcionarios";
    }

    public function listarFuncionario($id)
    {
        echo "Listando Cliente";
    }

    public function cadastrarFuncionario(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:8',
            'telefone' => 'required',
            'cortes' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'cortes' => 'required',
        ]);

        return redirect()->route("paginaLogin")->with('sucesso', 'Cadastro realizado com sucesso!');

    }
    public function autenticarFuncionario(Request $request){
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:8',
        ]);

        //chamarlistarFuncionario(email)
        //Retorno disso valida
        //Autentica

        return redirect()->route("dashboard");
    }

    public function alterarFuncionario($id)
    {
        echo "Alterando";
    }

    public function deletarFuncionario($id)
    {
        echo "Deletando";
    }

    public function paginaLoginFuncionario()
    {
        return view('Funcionarios/login');
    }

    public function paginaCadastroFuncionario()
    {
        return view('Funcionarios/cadastro');
    }


}

