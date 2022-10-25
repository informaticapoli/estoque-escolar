$(document).ready(function (){
    $("#pesquisar_prod").on("keyup", function(){
        let v = $(this).val();
        
    });
  });
  
function pesquisa(palavra){
    $.ajax({
        url:'http://localhost/estoque-escolar/produtos/pesquisa.php',
        type:'GET',
        dataType:'json',
        data:{
            palavra
        	},
        success:function(json) {
           let html = "";
           for (let i in json ){
            html+= "<tr>";
            html+= "<td>"+(json[i]['data_criacao'])+"</td>";
            html+= "<td>"+(json[i]['usuario_responsavel'])+"</td>";
            html+= "<td>"+(json[i]['status'])+"</td>";
            html+= "<td>"+(json[i]['descricao'])+"</td>";
            
           html+= "</tr>";
           }
           console.log(html);
           $("#lista").html(html);
           
        },
        error:function(e){
        }
    });
}
