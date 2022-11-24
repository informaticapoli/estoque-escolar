<?php
class Cardapio{
    public function cadCardapio($nome_card){

        global $db;

        $sql = "INSERT INTO cardapio SET nome_cardapio = :nome";
        $sql=$db->prepare($sql);
        $sql->bindValue(":nome", $nome_card);
        $sql->execute();
        $id_cardapio = $db->lastInsertId();

        header("Location: {$url}cad-itens-cardapio.php?id=$id_cardapio");
    }
    
    public function adicionar_prod_cardapio($prod_id, $qtd_turno1, $qtd_turno2, $qtd_turno3, $id_cardapio){

        global $db;

        $sql = "INSERT INTO item_cardapio SET id_produto = :id_prod, qtd_mat = :qtd_mat, qtd_vesp = :qtd_vesp, qtd_not = :qtd_not, id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_prod", $prod_id);   
        $sql->bindValue(":qtd_mat", $qtd_turno1);     
        $sql->bindValue(":qtd_vesp", $qtd_turno2);     
        $sql->bindValue(":qtd_not", $qtd_turno3);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        
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

        $sql = "SELECT item_cardapio.*, produtos.nome_produto 
        FROM item_cardapio 
        INNER JOIN produtos ON produtos.id_produto = item_cardapio.id_produto 
        WHERE id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_prod = $sql->fetchAll();
        }


        return $exibir_prod;
        
    }

    public function pegarNome($id_cardapio){

        global $db;

        $nome_prod = array();

        $sql = "SELECT * FROM cardapio WHERE id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue("id_cardapio" , $id_cardapio);
        $sql->execute();

        if($sql->rowCount()>0){
            $nome_prod = $sql->fetch();
        }

        return $nome_prod;
    }

    public function excluir_prod_cardapio($id){

        global $db;

        $sql = "DELETE FROM item_cardapio WHERE id_item_card = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql){
            return true;
        }else{
            return false;
        }

    }
}


?>