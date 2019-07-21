<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProdutoRequest;
use App\Produto;
use Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',
            ['only' => ['adiciona', 'remove']]);
    }

    public function lista()
    {
        $produtos = Produto::all();
        return view('produto/listagem')->with('produtos', $produtos);
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function mostra($id)
    {
        $produto = Produto::findOrFail($id);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto/detalhes')
            ->with('p', $produto);
    }

    public function novo()
    {
        return view('produto/formulario')
            ->with('action', 'adiciona');
    }

    public function altera($id)
    {
        $produto = Produto::findOrFail($id);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto/formulario')
            ->with('p', $produto)
            ->with('action', 'update');
    }

    public function update()
    {
        if(empty(Request::only('id'))) {
            return redirect()
                ->action('ProdutoController@lista');
        }


        return redirect()
            ->action('ProdutoController@lista')
            ->with('nome', Request::only('nome'));
    }

    public function adiciona(ProdutoRequest $request)
    {

        Produto::create($request->all());

//        equivalente ao de cima
//        $params = Request::all();
//        $produto = new Produto($params);
//        $produto->save();

//        equivalente ao de cima
//        $produto = new Produto();
//        $produto->nome = Request::input('nome');
//        $produto->valor = Request::input('valor');
//        $produto->descricao = Request::input('descricao');
//        $produto->quantidade = Request::input('quantidade');
//        $produto->save();

//       equivalente ao de cima
//       DB::insert('insert into produtos
//            (nome, valor, descricao, quantidade) values (?,?,?,?)',
//        array($nome, $valor, $descricao, $quantidade));

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function remove($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

}