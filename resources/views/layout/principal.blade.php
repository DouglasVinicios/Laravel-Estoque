@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Estoque Laravel</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
                    <li><a href="{{action('ProdutoController@novo')}}">Novo Produto</a></li>
                </ul>
            </div>
        </nav>
        @yield('conteudo')
        <footer class="footer">
            <p>© Livro laravel Casa do Código.</p>
        </footer>
    </div>
@stop
