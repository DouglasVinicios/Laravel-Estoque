@extends('layouts.principal')
@section('conteudo')
    <h3>Listagem de Produtos</h3>
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
        </div>
    @endif
    @if(empty($produtos))
        <div class="alert alert-danger">Nenhum produto cadastrado</div>
    @else
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $p)
                    <tr class="{{$p->quantidade<=1 ? 'danger' :''}}">
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->descricao }}</td>
                        <td>{{ $p->quantidade }}</td>
                        <td>
                            <a class="btn btn-outline-info btn-sm"
                               href="{{action('ProdutoController@mostra', $p->id)}}">Ver
                                mais</a>
                            <a class="btn btn-outline-danger btn-sm"
                               href="{{action('ProdutoController@remove', $p->id)}}">Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop