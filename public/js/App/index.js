/**
 *
 * @param {int} pagina
 */
function carregar(pagina){
    $.get('/contato/json', {page: pagina, q: "ama"}, function (resp) {
        montarTabela(resp);
        montarPaginator(resp);

        /**
         * Depois que tudo estiver carregado, verifico as ações dos links
         */
        $("#paginator>ul>li>a").click(function(){

            let pag = $(this).attr('pagina');
            localStorage.setItem('pagina', pag);

            console.log(localStorage.getItem("pagina"));
            console.log(localStorage.getItem("pagina55"));

            /**
             * Passando o numero da pagina
             */
            carregar(pag);
        });

    });
}

/**
 *
 * @param {Array} data
 */
function montarTabela(data){
    // Remove todas as linhas da tabela
    $("#tabelaContato>tbody>tr").remove();

    for(let i = 0; i<data.data.length; i++){
        let linha = montarLinha(data.data[i]);
        $("#tabelaContato>tbody").append(linha);
    }
}

/**
 *
 * @param {Object} contato
 * @returns {string}
 */
function montarLinha(contato){
    return `
        <tr>
            <th scope="row">${contato.id}</th>
            <td>${contato.nome}</td>
            <td>${contato.telefone}</td>
            <td>${contato.email}</td>
            <td>${contato.cep}</td>
            <td>${contato.logradouro}</td>
            <td>${contato.bairro}</td>
            <td>${contato.localidade}</td>
            <td>${contato.complemento}</td>
            <td>${contato.uf}</td>
            <td>
                <a type="button" href="/contato/${contato.id}" class="btn btn-info btn-lg">
                  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
    `;
}

/**
 * Monta cada item da lista
 *
 * @param {Array} data
 * @param {int} i
 * @returns {string}
 */
function getItem(data, i){
    let active = (i == data.current_page) ? "class='active'" : "";
    return `
        <li ${active}>
            <a href="#" pagina="${i}">${i}</a>
        </li>
    `;
}

/**
 * Funcionalidade do link voltar, da paginação
 *
 * @param {Array} data
 * @returns {string}
 */
function getItemAnterior(data){

    // Não estamos na primeira pagina, temos item anterior
    if(data.current_page > 1){
        let i = data.current_page - 1;
        return `
            <li>
                <a href="#" pagina="${i}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
        `;
    }else{
        return '';
    }
}

/**
 * Funcionalidade do link proximo, da paginação
 *
 * @param {Array} data
 * @returns {string}
 */
function getItemProximo(data){
    // Não estamos na ultima pagina, temos proximos itens
    if(data.current_page < data.last_page){
        let i = data.current_page + 1;
        return `
            <li>
                <a href="#" pagina="${i}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        `;
    }else{
        return '';
    }
}

/**
 * Montar a paginação
 *
 * @param {Array} data
 */
function montarPaginator(data){
    $("#paginator>ul>li").remove();
    $("#paginator>ul").append(getItemAnterior(data));

    let n = 10;
    let inicio, fim;

    if (data.current_page - n/2 <= 1)
        inicio = 1;
    else if (data.last_page - data.current_page < n)
        inicio = data.last_page - n + 1;
    else
        inicio = data.current_page - n/2;

    fim = inicio + n-1;
    for(let i = inicio; i<=fim; i++){
        let item = getItem(data, i);
        $("#paginator>ul").append(item);
    }
    $("#paginator>ul").append(getItemProximo(data));
}

$(function () {
    let pag = (localStorage.getItem("pagina") == null) ? 1 : localStorage.getItem("pagina");
    carregar(pag);

    // $("#btn-pesquisar").click(function () {
    //     console.log("cliq");
    // })

    $("#form-pesq").submit(function () {
        console.log($("#input-pesquisa").val());
        return false;
    });
});
