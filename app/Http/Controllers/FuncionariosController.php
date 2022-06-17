<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
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
            'cargo' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'cortes' => 'required',
        ]);

        $params = $request->except('_token');
        $funcionario = Funcionario::create($params);
        return redirect()->route("paginaLogin")->with('sucesso', 'Cadastro realizado com sucesso!');

    }
    public function autenticarFuncionario(Request $request){
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:8',
        ]);
        $funcionario = Funcionario::where('email', $request->email)->where('senha', $request->senha)->first();

        if ($funcionario != null) {
            $request->session()->put('autenticado', 'ok');
            return redirect()->route("dashboard")->with('sucesso', 'Login realizado com sucesso!');
        } else {
            return redirect()->route("paginaLogin")->with('error', 'Login ou senha incorretos!');
        }

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

