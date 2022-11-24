$(document).ready(function (){
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
    listarItens(id_cardapio);

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
            //let html = "";
            /*for (let i in json.produtos){
                html+= "<tr>";
                html+= "<td>"+(json.produtos[i]['id_produto'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_mat'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_vesp'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_not'])+"</td>";
                html+= "<td> <a class='btn btn-danger' href='javascript:;' onclick='excluir("+json.produtos[i]['id_info']+")' >X</a></td>";
                
                html+= "</tr>";*/
            //}
            /*$("#produtos_cad").html(html);
            limparCampos();*/
            listarItens(id_cardapio);

        },
        error: function (request, status, error) {
            console.log(error);
        }
        
    });
}

    /*function pegarProdutos(id_cardapio){
        $.ajax({
            url:'http://localhost/estoque-escolar/cardapio/pegar_produtos.php',
            type:'POST',
            dataType:'json',
            data:{
                id_cardapio
                },
            success:function(json) {
                let html = "";
                for (let i in json.produtos){
                    html+= "<tr>";
                    html+= "<td>"+(json.produtos[i]['nome_produto'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_mat'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_vesp'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_not'])+"</td>";
                    html+= "<td> <a class='btn btn-danger' href='javascript:;' onclick='excluir_item("+json.produtos[i]['id_item_card']+")' >X</a></td>";
                    
                    html+= "</tr>";
                }
                $("#produtos_cad").html(html);
                limparCampos();
            },
            error: function (request, status, error) {
                console.log(error);
            }
            
        });
    }*/
        
    function limparCampos(){
        $("#pesquisar_prod").val("");
        $("#prod_nome").val("");
        $("#qtd_turno1").val("");
        $("#qtd_turno2").val("");
        $("#qtd_turno3").val("");
        $("#pesquisar_prod").focus();
    }

    function excluir_item(id){
        let id_cardapio = $('#id_cardapio').val();
        //console.log(id_cardapio);
        $.ajax({
            url:'http://localhost/estoque-escolar/cardapio/excluir_item.php',
            type: 'POST',
            dataType:'json',
            data: {  id  },
            success:function(json){
                listarItens(id_cardapio);
            }

        });
    

    }

    function listarItens(id_cardapio){
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
                    html+= "<td>"+(json.produtos[i]['qtd_mat'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_vesp'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_not'])+"</td>";
                    html+= "<td> <a class='btn btn-danger' href='javascript:;' onclick='excluir_item("+json.produtos[i]['id_item_card']+")' >X</a></td>";
                    
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
                html+= "<td>"+(json[i]['id_produto'])+"</td>";
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


    


