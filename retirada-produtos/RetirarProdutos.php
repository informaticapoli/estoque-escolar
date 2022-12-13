<?php
class RetirarProdutos{

    public function pegaCardapio(){
        
        global $db;

        $prod_cardapio = array();

        $sql = "SELECT * FROM cardapio ORDER BY nome_cardapio";
        $sql = $db->prepare($sql);
        $sql->execute();
        $prod_cardapio = $sql->fetchAll();
        return $prod_cardapio;
        // print_r($sql->errorInfo());exit; 

    }

    public function pegaCardapioPeloID($id){
        
        global $db;

        $prod_cardapio = array();

        $sql = "SELECT * FROM cardapio WHERE id_cardapio = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        $prod_cardapio = $sql->fetch();
        return $prod_cardapio;
        // print_r($sql->errorInfo());exit; 

    }

    public function resumoRetirada($id_cardapio){

        global $db;

        $resultado = array();

        $sql = "SELECT *, produtos.nome_produto FROM item_cardapio
        INNER JOIN produtos ON item_cardapio.id_produto = produtos.id_produto
        WHERE id_cardapio = :id_cardapio";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_cardapio", $id_cardapio);
        $sql->execute();

       /* print_r($sql->errorInfo());
        echo $sql->rowCount();
        exit;*/

        if($sql->rowCount()>0){
            $resultado = $sql->fetchAll();
        }

        return $resultado;

    }
}
?>