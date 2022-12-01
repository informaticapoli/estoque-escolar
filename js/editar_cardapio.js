$(document).ready(function (){
    $(".btn-add-prod").on("click", function(){
        $(".resultado").html("");
        $("#pesquisar_prod").val("");
        setTimeout(() => {
            $("#pesquisar_prod").focus();
        }, 500);
    });
    $("#ativarModal").on("focus", function(){
        $("#exampleModal").modal("show");
    });
    $("#pesquisar_prod").on("keyup", function(){
        let palavra = $(this).val();
        if(palavra.length == 0){
            $(".resultado").html("");
            $(".resultado").hide("slow");
        }else{
            pesquisa(palavra);
        }
    });
    let id_cardapio = $("#id_cardapio").val();
    editarCardapio(id_cardapio);

    $("#adicionar_prod").on("click", function(){
        let prod_id = $("#prod_id").val();
        let qtd_turno1 = $("#qtd_turno1").val();
        let qtd_turno2 = $("#qtd_turno2").val();
        let qtd_turno3 = $("#qtd_turno3").val();
        let id_cardapio = $("#id_cardapio").val();
        if(prod_id != "", qtd_turno1 != "", qtd_turno2 !="", qtd_turno3 !="", id_cardapio != ""){
            adicionarProdutoCardapio(prod_id, qtd_turno1, qtd_turno2, qtd_turno3, id_cardapio);
        }else{
            alert("Preencha todos os campos");
        }
    });

    $("#editarCardapioAcao").on("click", function(){
        editarCardapioAcao();
    });
});


function editarCardapio(id_cardapio){
    $.ajax({
        url:'http://localhost/estoque-escolar/cardapio/listar_itens.php',
        type: 'POST',
        dataType: 'json',
        data: {  id_cardapio },
        success: function(json){
            let html = "";
            for (let i in json.produtos){
                html+= "<tr>";
                html+= "<td>"+(json.produtos[i]['nome_produto'])+"</td>";
                html+= "<td>"+(json.produtos[i]['matutino'])+" g</td>";
                html+= "<td>"+(json.produtos[i]['vespertino'])+" g</td>";
                html+= "<td>"+(json.produtos[i]['noturno'])+" g</td>";
                html+= "<td> <a class='btn btn-warning' href='javascript:;' onclick='editar_item("+json.produtos[i]['id_item_card']+", "+(json.produtos[i]['matutino'])+", "+(json.produtos[i]['vespertino'])+", "+(json.produtos[i]['noturno'])+" )'  >Editar</a></td>";
                
                html+= "</tr>";
            }
            $("#produtos_cardapio").html(html);
            limparCampos();
        },
        error: function (request, status, error) {
            console.log(error);
        }

    });
    
}

function editar_item(id, turno1, turno2, turno3){
    $("#editar_cardapio").modal("show");
    $("#id_item_card").val(id);
    $("#turno1").val(turno1);
    $("#turno2").val(turno2);
    $("#turno3").val(turno3);
}

function editarCardapioAcao(){
    let id_item_card = $("#id_item_card").val();
    let turno1 = $("#turno1").val();
    let turno2 = $("#turno2").val();
    let turno3 = $("#turno3").val();

    if(id_item_card != "" && id_item_card != undefined){
        if(turno1 != "" && turno2 != "" && turno3 != ""){
            $.ajax({
                url:'http://localhost/estoque-escolar/cardapio/editar_cardapio_acao.php',
                type: 'POST',
                dataType: 'json',
                data: {  
                    id_item_card, turno1, turno2, turno3 
                },
                success: function(json){
                    let html = "";
                    for (let i in json.produtos){
                        html+= "<tr>";
                        html+= "<td>"+(json.produtos[i]['nome_produto'])+"</td>";
                        html+= "<td>"+(json.produtos[i]['matutino'])+" g</td>";
                        html+= "<td>"+(json.produtos[i]['vespertino'])+" g</td>";
                        html+= "<td>"+(json.produtos[i]['noturno'])+" g</td>";
                        html+= "<td> <a class='btn btn-warning' href='javascript:;' onclick='editar_item("+json.produtos[i]['id_item_card']+", "+(json.produtos[i]['matutino'])+", "+(json.produtos[i]['vespertino'])+", "+(json.produtos[i]['noturno'])+" )'  >Editar</a></td>";
                        
                        html+= "</tr>";
                    }
                },
                error: function (request, status, error) {
                    console.log(error);
                }
        
            });
        }
    }
}