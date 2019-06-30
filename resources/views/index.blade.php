@extends("app")

@section("titulo", "Contatos")

@section("conteudo")
    <div class="row my-row">
        <a href="/contato/create" class="btn btn-success btn-lg" style="float: right">
            <i class="fas fa-user-plus"></i>
            Cadastrar contato
        </a>
    </div>
    <div class="row my-row">
        @if(session('msg') || session('msgError'))
            <div class="alert alert-{{ session('msg') ? "success" : "danger" }} alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('msg') ? session('msg') : session('msgError') }}
            </div>
        @endif
    </div>
    <div class="row my-row">
        <div class="col-md-6 my-div">
            <form class="form-inline" id="pesquisa-dupla">
                <div class="form-group">
                    <input type="text" class="form-control" id="pesquisa-nome" placeholder="Jane Doe" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pesquisa-email" placeholder="jane.doe@example.com"
                           required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
        </div>
        <div class="col-md-3 my-div">
            <form class="form-inline" id="form-pesq">
                <div class="form-group">
                    <input type="text" class="form-control" id="input-pesquisa" placeholder="pesquisar" required>
                </div>
                <button type="submit" class="btn btn-primary" id="btn-pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-danger" title="Clique aqui para limpar os campos de pesquisa e paginação" style="float: right" id="btn-limpar-filtros">
                <i class="fas fa-broom"></i>
                Limpar filtros
            </button>
        </div>
    </div>
    <div class="row tabela">
        <table class="table table-striped" id="tabelaContato">
            <thead>
            <tr>
                <th  class="text-center">#</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Telefone</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Cep</th>
                <th class="text-center">Rua</th>
                <th class="text-center">Bairro</th>
                <th class="text-center">Cidade</th>
                <th class="text-center">Complemento</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Visualizar</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="row">
        <nav id="paginator">
            <ul class="pagination">
            </ul>
        </nav>
    </div>
@endsection

@section("js")
    <script src="{{asset('js/App/index.js')}}" type="text/javascript"></script>
@endsection

