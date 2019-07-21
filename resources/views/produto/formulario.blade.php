@extends('layouts.principal')

@section('conteudo')
    <h2>Novo Produto</h2>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/produtos/adiciona" method="post">
        @csrf
        <input type="hidden" name="id" value="{{!empty($p)? $p->id : ''}}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" class="form-control" value="{{!empty(old('nome')) ? old('nome') : $p->nome }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input name="descricao" class="form-control" value="{{!empty(old('descricao')) ? old('descricao') : $p->descricao }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input name="valor" class="form-control" value="{{!empty(old('valor')) ? old('valor') : $p->valor }}">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{!empty(old('quantidade')) ? old('quantidade') : $p->quantidade }}">
        </div>
        <button type="submit" class="btn btn-outline-success btn-block">Salvar</button>
    </form>
@stop