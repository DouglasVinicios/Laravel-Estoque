@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a class="text-center"><h1>Estoque Laravel</h1></a>
            </div>
            <div class="col-sm-12 text-center list-inline">
                <a class="list-inline-item mr-2" href="{{action('ProdutoController@lista')}}">Listagem</a>
                <a class="list-inline-item ml-2" href="{{action('ProdutoController@novo')}}">Novo Produto</a>
            </div>
        </div>
        @yield('conteudo')
        <footer class="blockquote-footer text-lg-right mt-lg-auto">
            <p>© Douglas Vinicios.</p>
        </footer>
    </div>
@stop
