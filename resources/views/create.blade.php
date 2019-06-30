@extends("app")

@section("titulo", "Cadastrar contato")

@section("conteudo")
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Cadastrar Contato</h3>
            </div>
            <div class="panel-body">
                @if(session('msg') || session('msgError'))
                    <div class="alert alert-{{ session('msg') ? "success" : "danger" }} alert-dismissible fade in"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('msg') ? session('msg') : session('msgError') }}
                    </div>
                @endif
                <form action="/contato" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                        <label class="control-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                        <span class="help-block">{{ $errors->first('nome') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                        <label class="control-label">Telefone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">
                        <span class="help-block">{{ $errors->first('telefone') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label class="control-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    </div>
                    <div id="div-cep" class="form-group div-endereco {{ $errors->has('cep') ? 'has-error' : ''}}">
                        <label class="control-label">Cep <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}">
                        <span class="help-block msg-endereco" id="msg-cep">{{ $errors->first('cep') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('logradouro') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Rua
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="rua" name="logradouro"
                               value="{{ old('logradouro') }}">
                        <span class="help-block msg-endereco">{{ $errors->first('logradouro') }}</span>
                    </div>
                    <div class="form-group div-endereco">
                        <label class="control-label">
                            Complemento
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               value="{{ old('complemento') }}">
                        <span class="help-block msg-endereco">{{ $errors->first('complemento') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('bairro') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Bairro
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}">
                        <span class="help-block msg-endereco">{{ $errors->first('bairro') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('localidade') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Cidade
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="cidade" name="localidade"
                               value="{{ old('localidade') }}">
                        <span class="help-block msg-endereco">{{ $errors->first('localidade') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('uf') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Estado
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{ old('uf') }}">
                        <span class="help-block msg-endereco">{{ $errors->first('uf') }}</span>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg" id="btn-submit"><i class="fas fa-plus"></i> Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{asset('js/App/ViaCep.js')}}" type="text/javascript"></script>
@endsection
