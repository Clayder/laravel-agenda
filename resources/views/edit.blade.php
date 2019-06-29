<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contatos</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/683d3262aa.js"></script>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" style="margin-top: 30px; padding: 20px">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Editar Contato</h3>
            </div>
            <div class="panel-body">
                @if(session('msg') || session('msgError'))
                    <div class="alert alert-{{ session('msg') ? "success" : "danger" }} alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('msg') ? session('msg') : session('msgError') }}
                    </div>
                @endif
                <form action="/contato/update" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                        <label class="control-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $contato->nome }}">
                        <span class="help-block">{{ $errors->first('nome') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                        <label class="control-label">Telefone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') ? old('telefone') : $contato->telefone }}">
                        <span class="help-block">{{ $errors->first('telefone') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label class="control-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $contato->email }}">
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    </div>
                    <div id="div-cep" class="form-group div-endereco {{ $errors->has('cep') ? 'has-error' : ''}}">
                        <label class="control-label">Cep <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') ? old('cep') : $contato->cep }}">
                        <span class="help-block msg-endereco" id="msg-cep">{{ $errors->first('cep') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('logradouro') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Rua
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="rua" name="logradouro" value="{{ old('logradouro') ? old('logradouro') : $contato->logradouro }}">
                        <span class="help-block msg-endereco">{{ $errors->first('logradouro') }}</span>
                    </div>
                    <div class="form-group div-endereco">
                        <label class="control-label">
                            Complemento
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') ? old('complemento') : $contato->complemento }}">
                        <span class="help-block msg-endereco">{{ $errors->first('complemento') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('bairro') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Bairro
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') ? old('bairro') : $contato->bairro }}">
                        <span class="help-block msg-endereco">{{ $errors->first('bairro') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('localidade') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Cidade
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="cidade" name="localidade" value="{{ old('localidade') ? old('localidade') : $contato->localidade }}">
                        <span class="help-block msg-endereco">{{ $errors->first('localidade') }}</span>
                    </div>
                    <div class="form-group div-endereco {{ $errors->has('uf') ? 'has-error' : ''}}">
                        <label class="control-label">
                            Estado
                            <span class="text-danger">*</span>
                            <span class="fa fa-spinner fa-spin spinner-endereco" style="display: none"></span>
                        </label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{ old('uf') ? old('uf') : $contato->uf }}">
                        <span class="help-block msg-endereco">{{ $errors->first('uf') }}</span>
                    </div>

                    <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Editar </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="{{asset('js/App/ViaCep.js')}}" type="text/javascript"></script>
</body>
</html>
