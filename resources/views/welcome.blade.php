<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <form action="/contato" method="POST">
        @csrf

        <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
            <label class="control-label">nome</label>
            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
            <span class="help-block">{{ $errors->first('nome') }}</span>
        </div>
        <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
            <label class="control-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">
            <span class="help-block">{{ $errors->first('telefone') }}</span>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label class="control-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group {{ $errors->has('cep') ? 'has-error' : ''}}">
            <label class="control-label">Cep</label>
            <input type="text" class="form-control" name="cep" value="{{ old('cep') }}">
            <span class="help-block">{{ $errors->first('cep') }}</span>
        </div>
        <div class="form-group {{ $errors->has('logradouro') ? 'has-error' : ''}}">
            <label class="control-label">logradouro</label>
            <input type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">
            <span class="help-block">{{ $errors->first('logradouro') }}</span>
        </div>
        <div class="form-group">
            <label class="control-label">Complemento</label>
            <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
            <span class="help-block">{{ $errors->first('complemento') }}</span>
        </div>
        <div class="form-group {{ $errors->has('bairro') ? 'has-error' : ''}}">
            <label class="control-label">bairro</label>
            <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
            <span class="help-block">{{ $errors->first('bairro') }}</span>
        </div>
        <div class="form-group {{ $errors->has('localidade') ? 'has-error' : ''}}">
            <label class="control-label">localidade</label>
            <input type="text" class="form-control" name="localidade" value="{{ old('localidade') }}">
            <span class="help-block">{{ $errors->first('localidade') }}</span>
        </div>
        <div class="form-group {{ $errors->has('uf') ? 'has-error' : ''}}">
            <label class="control-label">Estado</label>
            <input type="text" class="form-control" name="uf" value="{{ old('uf') }}">
            <span class="help-block">{{ $errors->first('uf') }}</span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
