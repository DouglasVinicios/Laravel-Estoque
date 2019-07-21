@extends('layouts.principal')
@section('conteudo')
    <h3>Listagem de Categorias</h3>
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> A categoria {{old('nome')}} foi adicionado.
        </div>
    @endif
    @if(empty($categorias))
        <div class="alert alert-danger">Nenhuma categoria cadastrado</div>
    @else
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $c)
                    <tr class="table-info">
                        <td>{{ $p->nome }}</td>
                        <td>{{ $c->descricao }}</td>
                        <td>
                            <a class="btn btn-outline-info btn-sm"
                               href="{{action('CategoriaController@mostra', $c->id)}}">Ver
                                mais</a>
                            <a class="btn btn-outline-danger btn-sm"
                               href="{{action('CategoriaController@remove', $c->id)}}">Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop