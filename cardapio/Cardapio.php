<?php
class Cardapio{
    public function cadCardapio($nome_card){

        global $db;

        $sql = "INSERT INTO cardapio SET nome_cardapio = :nome";
        $sql=$db->prepare($sql);
        $sql->bindValue(":nome", $nome_card);
        $sql->execute();
        
        header("Location: {$url}cad-itens-cardapio.php");
    }

    public function finalizarCardapio(){
        
    }
    
    public function adicionar_prod_cardapio($prod_id, $prod_qtd){

        global $db;

        $sql = "INSERT INTO info_produtos_entrada SET id_produto = :id_produto, qtd = :qtd";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);   
        $sql->bindValue(":qtd", $prod_qtd);     
        $sql->execute();
        
        if($sql){
            return true;
        }else{
            return false;
        }

        //echo "<pre>";
        //print_r($sql->errorInfo());
        //exit;
    }

}


?>