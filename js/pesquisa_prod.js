$(document).ready(function (){
    $("#pesquisar_prod").on("keyup", function(){
        let palavra = $(this).val();
        pesquisa(palavra);
    });
  });


    function selecionarProduto(id_produto){
        alert(id_produto);
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
                html+= "<tr id='produto_"+json[i]['id_produto']+"' onclick=selecionarProduto("+json[i]['id_produto']+")>";
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
