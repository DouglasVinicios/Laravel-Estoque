@extends('layouts.principal')
@section('conteudo')
<h1>Detalhes do produto: {{ $p->nome }}</h1>
<ul>
    <li><b>Valor: </b> R${{ $p->valor }}</li>
    <li><b>Descrição: </b>{{ $p->descricao }}</li>
    <li><b>Quantidade em estoque: </b>{{ $p->quantidade }}</li>
</ul>
    <div class="btn btn-outline-info btn-lg">
        <a href="{{action('ProdutoController@altera', $p->id)}}">Alterar</a>
    </div>
@stop