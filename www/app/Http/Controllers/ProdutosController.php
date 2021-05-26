<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Resources\ProdutosResource;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = ProdutosResource::collection(Produto::all());
        return view('produtos.home', compact('produtos'));
    }

    public function show($id)
    {
        $produto = Produto::whereId($id)->first();
        $result = new ProdutosResource($produto);
        return $result;
    }

    public function store(Request $request) 
    {
        $data = $request->only('nome', 'descricao', 'preco', 'quantidade');
        $result = Produto::create($data);
        return [
            "data" => new ProdutosResource($result),
            "success" => true
        ];
        
    }

    public function update($id, Request $request)
    {
        $data = $request->only('nome', 'descricao', 'preco', 'quantidade');
        $update = Produto::whereId($id)->update($data);
        $result = ProdutosResource::collection(Produto::all());
        return [
            "data" => $result,
            "success" => true
        ];
        
    }

    public function delete($id)
    {   
        $result = Produto::whereId($id)->delete();
        return [
            "success" => $result
        ];
    }

    public function search_produtos(Request $request) 
    {
        $result = Produto::where('nome', 'like', $request->search.'%')->get();
        $produtos = ProdutosResource::collection($result);
        return view('inc.table', compact('produtos'));
    }
}
