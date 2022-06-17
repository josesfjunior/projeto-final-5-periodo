<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function cadastrarProduto(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'quantidade' => 'required',
            'descricao' => 'required',
        ]);

        $params = $request->except('_token');
        $produto = Produto::create($params);
        return redirect()->route('paginaCadastroProduto')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function deletarProduto(Request $request)
    {
        $id = $request->id;
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('dashboardProdutos')->with('sucesso', 'Produto deletado com sucesso!');
    }

    public function paginaProdutos()
    {
        $produtos = Produto::all();
        return view('/Produtos/listarProdutos', compact('produtos'));
    }

    public function dashboardProdutos()
    {
        $produtos = Produto::all();
//        foreach ($produtos as $produto){
//           echo $produto->preco = number_format($produto->preco, 2, ',', '.');
//        };

        return view('/Produtos/dashboardProdutos', compact('produtos'));

    }
    public function paginaCadastroProduto()
    {
        return view('/Produtos/cadastrarProduto');
    }
}
