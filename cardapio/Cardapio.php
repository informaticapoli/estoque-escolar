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
    
    public function adicionar_prod_cardapio($prod_id, $qtd_mat, $qtd_vesp, $qtd_not){

        global $db;

        $sql = "INSERT INTO info_produtos_entrada SET id_produto = :id_produto, qtd_mat = :qtd_mat, qtd_vesp = :qtd_vesp, qtd_not = :qtd_not";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);   
        $sql->bindValue(":qtd_mat", $qtd_mat);     
        $sql->bindValue(":qtd_vesp", $qtd_vesp);     
        $sql->bindValue(":qtd_not", $qtd_not);
        
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