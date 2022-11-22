$(document).ready(function (){
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
            let html = "";
            for (let i in json.produtos){
                html+= "<tr>";
                html+= "<td>"+(json.produtos[i]['id_produto'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_mat'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_vesp'])+"</td>";
                html+= "<td>"+(json.produtos[i]['qtd_not'])+"</td>";
                html+= "<td> <a class='btn btn-danger' href='javascript:;' onclick='excluir("+json.produtos[i]['id_info']+")' >X</a></td>";
                
                html+= "</tr>";
            }
            $("#produtos_cad").html(html);
            limparCampos();
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
        
    });
}

    function pegarProdutos(id_cardapio){
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
                    html+= "<td>"+(json.produtos[i]['id_produto'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_mat'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_vesp'])+"</td>";
                    html+= "<td>"+(json.produtos[i]['qtd_not'])+"</td>";
                    html+= "<td> <a class='btn btn-danger' href='javascript:;' onclick='excluir("+json.produtos[i]['id_info']+")' >X</a></td>";
                    
                    html+= "</tr>";
                }
                $("#produtos_cad").html(html);
                limparCampos();
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
            
        });
    }


