$(document).ready(function() {

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#complemento").val("");
    }

    function removeClassHas(tag){
        $(tag).removeClass(function (index, css) {
            // Removendo classes com prefixo has
            return (css.match (/\bhas-\S+/g) || []).join(' ');         });
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            let divClass = $("#div-cep");
            $(".msg-endereco").hide();
            removeClassHas($(".div-endereco"));

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                // Exibir o load enquanto consulta webservice.
                $(".spinner-endereco").show();

                $("#btn-submit").prop("disabled",false);
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        $(".spinner-endereco").hide();
                        $(".div-endereco").addClass("has-success");
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#complemento").val(dados.complemento);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulario_cep();
                        $(divClass).addClass("has-warning");
                        $("#msg-cep").show().html("CEP não encontrado.");
                        $(".spinner-endereco").hide();
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                $(divClass).addClass("has-error");
                $("#msg-cep").show().html("CEP inválido.");
                $("#btn-submit").prop("disabled",true);
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    });
});
