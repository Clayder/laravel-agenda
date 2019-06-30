@extends('app')

@section('conteudo')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-user-circle"></i> Cadastrar Usuário</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label>Nome</label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}">
                        <span id="helpBlock2" class="help-block">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        <span id="helpBlock2" class="help-block">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="password">
                        <span id="helpBlock2" class="help-block">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                        <label>Confirmar senha</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        <span id="helpBlock2" class="help-block">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-plus"></i>
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
