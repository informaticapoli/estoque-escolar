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
}
?>