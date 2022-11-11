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
    

}


?>