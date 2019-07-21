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
        return view('produto/detalhes')
            ->with('p', $produto);
    }

    public function novo()
    {
        return view('produto/formulario')
            ->with('p', new Produto());
    }

    public function altera($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto/formulario')
            ->with('p', $produto);
    }

    // enquanto nao tem o service, adiciona novo ou altera existente
    public function adiciona(ProdutoRequest $request)
    {
        // se id for vazio
        if (empty($request->get('id'))) {
            Produto::create($request->all());

        } else {
            $p = Produto::findOrFail($request->get('id'));
            $p->nome = $request->get('nome');
            $p->valor = $request->get('valor');
            $p->descricao = $request->get('descricao');
            $p->quantidade = $request->get('quantidade');
            $p->save();

        }

//        equivalente ao Produto::create($request->all());
//        $params = $request->all();
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