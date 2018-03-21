
@extends('layouts.layout')

@section('content')

    <h1>Banners</h1>

    @if (session('sucesso'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{ session('sucesso') }}
        </div>
    @elseif(session('erro'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{ session('erro') }}
        </div>
    @endif

    <div class="row">

    <div class="col-md-8 left">
        <a href="/create" class="btn btn-success">Cadastrar</a>
    </div>

    <div class="col-md-4 right">
        <form class="navbar-form navbar-right right" role="search" method="post" action="/search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <input type="submit" class="btn btn-default" value="Buscar">
        </form>
    </div>
    </div>


    @if($banners)
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        @foreach($banners as $b)
            <tr>
                <td>{{$b->nome}}</td>
                <td>{{$b->descricao}}</td>
                <td>{{$b->created_at}}</td>
                <td>
                    <a href="/show/{{$b->id}}" class="btn btn-success">Detalhes</a> |
                    <a href="/edit/{{$b->id}}" class="btn btn-info">Editar</a> |
                    <a href="/delete/{{$b->id}}" class="btn btn-danger" onclick="return confirm('Realmente deseja deletar este banner?')">Deletar</a>
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
    @else
        <h4 class="text-center">Nenhum banner cadastrado até o momento</h4>
    @endif

@endsection