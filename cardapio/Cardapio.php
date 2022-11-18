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
    
    public function adicionar_prod_cardapio($prod_id, $qtd_turno1, $qtd_turno2, $qtd_turno3){

        global $db;

        $sql = "INSERT INTO item_cardapio SET id_produto = :id_prod, qtd_mat = :qtd_mat, qtd_vesp = :qtd_vesp, qtd_not = :qtd_not";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_prod", $prod_id);   
        $sql->bindValue(":qtd_mat", $qtd_turno1);     
        $sql->bindValue(":qtd_vesp", $qtd_turno2);     
        $sql->bindValue(":qtd_not", $qtd_turno3);
        
        $sql->execute();

        
        /*echo "<pre>";
        print_r($sql->errorInfo());
        exit;*/
        
        if($sql){
            return true;
        }else{
            return false;
        }

    }

    public function exibir_prod_cardapio($id_cardapio){
        global $db;

        $exibir_prod = array();

        $sql = "SELECT *, produtos.nome_produto FROM item_cardapio
        INNER JOIN produtos ON item_cardapio.id_produto = produtos.id_produto
        WHERE item_cardapio.id_cardapio = :id_cardapio GROUP BY item_cardapio.id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_prod = $sql->fetchAll();
        }


        return $exibir_prod;
        
    }

}


?>