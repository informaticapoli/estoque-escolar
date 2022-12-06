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

    $("#excluir_prod_card").on("click", function(){
        let id_item_card = $("#id_item_card").val();
        let confirmar = confirm("Deseja realmente excluir esse item do cardápio?");
        if(confirmar){
            excluir_prod_card(id_item_card);
        }
    });

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

    $("#editar_nome").on("click", function(){
        $("#nome_cardapio").modal("show");
    });
});

function adicionarProdutoCardapio(prod_id, qtd_turno1, qtd_turno2, qtd_turno3, id_cardapio){
        
    $.ajax({
        url:'http://localhost/estoque-escolar/cardapio/produtos.php',
        type:'POST',
        dataType:'json',
        data:{
            prod_id, qtd_turno1, qtd_turno2, qtd_turno3, id_cardapio
            },
        success:function(json) {
            if(!json.sucesso){
                alert("Não foi possível adicionar o produto. Verifique se o produto já foi incluido.")
            }
            editarCardapio(id_cardapio);

        },
        error: function (request, status, error) {
            console.log(error);
        }
        
    });
}

function selecionarProduto(id_produto){
    $.ajax({
        url:'http://localhost/estoque-escolar/produtos/select_prod.php',
        type:'GET',
        dataType:'json',
        data:{
            id_produto
            },
        success:function(json) {
            $(".resultado").hide();
            $("#pesquisar_prod").val(json['']);
            $("#prod_id").val(json['id_produto']);
            $("#prod_nome").val(json['nome_produto']);
            //console.log(json);
        }
        
    });
}

function pesquisa(palavra){
    $.ajax({
        url:'http://localhost/estoque-escolar/produtos/pesquisa.php',
        type:'GET',
        dataType:'json',
        data:{
            palavra
            },
        success:function(json) {
            if(json.length > 0){
                $(".resultado").show("slow");
            }else{
                $(".resultado").hide("slow");
            }
            console.log(json.length);
        let html = "";
        for (let i in json ){
            html+= "<tr id='item-prod' id='produto_"+json[i]['id_produto']+"' onclick=selecionarProduto("+json[i]['id_produto']+")>";
            html+= "<td>"+(json[i]['nome_produto'])+"</td>";
            
        html+= "</tr>";
        }
        console.log(html);
        $(".resultado").html(html);
        listarItens(id_cardapio);
        
        },
        error:function(e){
        }
    });
}

function limparCampos(){
    $("#pesquisar_prod").val("");
    $("#prod_nome").val("");
    $("#qtd_turno1").val("");
    $("#qtd_turno2").val("");
    $("#qtd_turno3").val("");    
    $("#pesquisar_prod").focus();
}

//função para listar os produtos do cardapio
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
                html+= "<td> <a class='btn btn-warning' href='javascript:;' onclick='editar_item("+json.produtos[i]['id_item_card']+")'  >Editar</a></td>";
                
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

function editar_item(id_item_card){
    $("#editar_cardapio").modal("show");
    $.ajax({
        url:'http://localhost/estoque-escolar/cardapio/qtd_itens.php',
        type: 'POST',
        dataType: 'json',
        data: {  id_item_card },
        success: function(json){

        $("#id_item_card").val(json.produtos.id_item_card);
        $("#turno1").val(json.produtos.matutino);
        $("#turno2").val(json.produtos.vespertino);
        $("#turno3").val(json.produtos.noturno);
        },
        error: function (request, status, error) {
            console.log(error);
        }

    });

}

function editarCardapioAcao(){
    let id_item_card = $("#id_item_card").val();
    let id_cardapio = $("#id_cardapio").val();
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
                    console.log(json);
                    if(json.sucesso){
                        editarCardapio(id_cardapio);
                        $("#editar_cardapio").modal("hide");
                    }else{
                        alert("Não foi possível realizar essa ação.")
                    }
                    /*let html = "";
                    for (let i in json.produtos){
                        html+= "<tr>";
                        html+= "<td>"+(json.produtos[i]['nome_produto'])+"</td>";
                        html+= "<td>"+(json.produtos[i]['matutino'])+" g</td>";
                        html+= "<td>"+(json.produtos[i]['vespertino'])+" g</td>";
                        html+= "<td>"+(json.produtos[i]['noturno'])+" g</td>";
                        html+= "<td> <a class='btn btn-warning' href='javascript:;' onclick='editar_item("+json.produtos[i]['id_item_card']+", "+(json.produtos[i]['matutino'])+", "+(json.produtos[i]['vespertino'])+", "+(json.produtos[i]['noturno'])+" )' >Editar</a></td>";
                        
                        html+= "</tr>";
                    }*/
                },
                error: function (request, status, error) {
                    console.log(error);
                }
        
            });
        }
    }
}

function excluir_prod_card(id_item_card){
    let id_cardapio = $("#id_cardapio").val();
    $.ajax({
        url:'http://localhost/estoque-escolar/cardapio/excluir_prod_card.php',
        type: 'POST',
        dataType: 'json',
        data:{
            id_item_card
        },
        success: function(json){
            if(json.sucesso){
                editarCardapio(id_cardapio);
                $("#editar_cardapio").modal("hide");
                alert("Produto excluído com sucesso");
            }else{
                alert("Não foi possível realizar essa ação.")
            }
        },

    })


}