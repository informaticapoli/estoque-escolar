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

        if(!$this->prod_cadastrado($prod_id, $id_cardapio)){
            $sql = "INSERT INTO item_cardapio SET id_produto = :id_prod, qtd_mat = :qtd_mat, qtd_vesp = :qtd_vesp, qtd_not = :qtd_not, id_cardapio = :id_cardapio";
            $sql = $db->prepare($sql);
            $sql->bindValue(":id_prod", $prod_id);   
            $sql->bindValue(":qtd_mat", $qtd_turno1);     
            $sql->bindValue(":qtd_vesp", $qtd_turno2);     
            $sql->bindValue(":qtd_not", $qtd_turno3);
            $sql->bindValue(":id_cardapio", $id_cardapio);
            $sql->execute();

            return true;
        }else{
            return false;
        }
               
        /*echo "<pre>";
        print_r($sql->errorInfo());
        exit;*/

    }

    public function exibir_prod_cardapio($id_cardapio){
        global $db;

        $exibir_prod = array();

        $sql = "SELECT item_cardapio.*, LPAD(item_cardapio.qtd_mat, 3, '0') AS matutino, LPAD(item_cardapio.qtd_vesp, 3, '0') AS vespertino, LPAD(item_cardapio.qtd_not, 3, '0') AS noturno, produtos.nome_produto 
        FROM item_cardapio 
        INNER JOIN produtos ON produtos.id_produto = item_cardapio.id_produto 
        WHERE id_cardapio = :id_cardapio ORDER BY nome_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_prod = $sql->fetchAll();
        }


        return $exibir_prod;
        
    }

    public function exibir_cardapio(){
        global $db;

        $exibir_cardapio = array();

        $sql = "SELECT * FROM cardapio ORDER BY nome_cardapio";
        $sql = $db->prepare($sql);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_cardapio = $sql->fetchAll();
        }

        return $exibir_cardapio;
        
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

    private function prod_cadastrado($prod_id, $id_cardapio){

        global $db;

        $sql = "SELECT * FROM item_cardapio WHERE id_produto = :id_produto AND id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        $sql->execute();

        /*print_r($sql->errorInfo());
        echo $sql->rowCount();
        exit;*/

        if($sql->rowCount()>0){
            return true;
        }else{
            return false;
        }

    }

    public function editarCardapio($id_item_card, $turno1, $turno2, $turno3){

        global $db;

        $sql = "UPDATE item_cardapio SET qtd_mat = :qtd_mat, qtd_vesp = :qtd_vesp, qtd_not = :qtd_not WHERE id_item_card = :id_item_card";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_item_card", $id_item_card);   
        $sql->bindValue(":qtd_mat", $turno1);     
        $sql->bindValue(":qtd_vesp", $turno2);     
        $sql->bindValue(":qtd_not", $turno3);
        $sql->execute();

        if($sql){
            return true;
        }else{
            return false;
        }
    }


    public function exibir_item_cardapio($id_item_card){
        global $db;

        $exibir_prod = array();

        $sql = "SELECT item_cardapio.*, LPAD(item_cardapio.qtd_mat, 3, '0') AS matutino, LPAD(item_cardapio.qtd_vesp, 3, '0') AS vespertino, LPAD(item_cardapio.qtd_not, 3, '0') AS noturno, produtos.nome_produto 
        FROM item_cardapio 
        INNER JOIN produtos ON produtos.id_produto = item_cardapio.id_produto 
        WHERE id_item_card = :id_item_card ORDER BY nome_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_item_card", $id_item_card);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_prod = $sql->fetch();
        }

        return $exibir_prod;
        
    }

    public function excluir_prod_card($id_item_card){

        global $db;

        $sql = "DELETE FROM item_cardapio WHERE id_item_card = :id_item_card";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_item_card", $id_item_card);
        $sql->execute();

        if($sql){
            return true;
        }else{
            return false;
        }

    }

    public function editarNomeCardapio($id_cardapio, $nome_cardapio){
        echo "Teste";
        exit;
        
        global $db;

        $sql = "UPDATE cardapio SET nome_cardapio = :nome_cadapio WHERE id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue("nome_cardapio", $nome_cardapio);
        $sql->bindValue("id_cardapio", $id_cardapio);
        $sql->execute();

        if($sql){
            return true;
        }else{
            return false;
        }
    }

}

?>