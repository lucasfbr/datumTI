
@extends('layouts.layout')

@section('content')

    <h1>Banners</h1>


    <a href="/create" class="btn btn-success">Cadastrar</a>

    <br />
    <br />

    <div class="row">
        <div class="col-md-12">
            <div class="thumbnail">
                <img src="/{{$banner->banner}}" alt="{{$banner->nome}}" class="img-responsive">
                <div class="caption">
                    <h3>{{$banner->nome}}</h3>
                    <p>{{$banner->descricao}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection