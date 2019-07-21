@extends('layout.principal')
@section('conteudo')
    <h1>Listagem de Produtos</h1>
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
        </div>
    @endif
    @isset($erro)
        <div class="alert alert-danger">
            <p>{{$erro}}</p>
        </div>
    @endisset
    @isset($sucesso)
        <div class="alert alert-danger">
            <p>{{$sucesso}}</p>
        </div>
    @endisset
    @if(empty($produtos))
        <div class="alert alert-danger">Nenhum produto cadastrado</div>
    @else
        <table class="table table-hover table-bordered table-sm">
            @foreach($produtos as $p)
                <tr class="{{$p->quantidade<=1 ? 'danger' :''}}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td><a class="btn btn-outline-info btn-sm" href="{{action('ProdutoController@mostra', $p->id)}}">Ver
                            mais</a></td>
                    <td><a class="btn btn-outline-danger btn-sm" href="{{action('ProdutoController@remove', $p->id)}}">Remover</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@stop