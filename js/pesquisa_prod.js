$(document).ready(function (){
    $("#pesquisar_prod").on("keyup", function(){
        let palavra = $(this).val();
        pesquisa(palavra);
    });
    $("#salvar_prod").on("click", function(){
        let prod_id = $("#prod_id").val();
        let prod_qtd = $("#prod_qtd").val();
        let prod_valor = $("#prod_valor").val();
        if(prod_id != "" && prod_qtd != "" && prod_valor != ""){
            adicionarProdutoNota(prod_id, prod_qtd, prod_valor);
        }
    });
   
  });

    function adicionarProdutoNota(prod_id, prod_qtd, prod_valor){
        $.ajax({
            url:'http://localhost/estoque-escolar/nota/produtos.php',
            type:'POST',
            dataType:'json',
            data:{
                prod_id, prod_qtd, prod_valor
                },
            success:function(json) {
                
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
            
            },
            error:function(e){
            }
        });


    }
