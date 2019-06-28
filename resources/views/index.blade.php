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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <form class="form-inline" style="float: right" id="form-pesq">
            <div class="form-group">
                <input type="text" class="form-control" id="input-pesquisa" placeholder="pesquisar">
            </div>
            <button type="submit" class="btn btn-primary" id="btn-pesquisar">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" id="btn-limpar-filtros">
                Limpar filtros
            </button>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped" id="tabelaContato">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Cep</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Localidade</th>
                <th>Complemento</th>
                <th>Estado</th>
                <th>Visualizar</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <nav id="paginator">
            <ul class="pagination">
            </ul>
        </nav>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="{{asset('js/App/index.js')}}" type="text/javascript"></script>
</body>
</html>
