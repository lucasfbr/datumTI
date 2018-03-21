
@extends('layouts.layout')

@section('content')

    <h1>Novo Banner</h1>

    <form action="/store" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome">Nome</label>
                    <input class="form-control" id="nome" name="nome" value="{{ old('nome') }}"
                           type="text">

                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                    <label for="descricao">Descrição</label>
                    <input class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}"
                           type="text">

                    @if ($errors->has('descricao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" id="banner" name="banner">

                        @if ($errors->has('banner'))
                            <span class="help-block">
                            <strong>{{ $errors->first('banner') }}</strong>
                        </span>
                        @endif

                        <p class="help-block">Selecione o banner aqui</p>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Cadastrar">

    </form>

@endsection