<?php
class Fornecedor{

public function cadastrar($fornecedor){
        $fornecedor = $_POST['fornecedor'];
        $endereco = $_POST['endereco'];
        $contato = $_POST['contato'];
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];
        $email = $_POST['email'];

        global $db;

        $sql = "INSERT INTO fornecedor SET nome_fornecedor = :fornecedor, endereco_fornecedor = :endereco, contato_fornecedor = :contato, telefone1 = :telefone1, telefone2 = :telefone2, email = :email";
        $sql = $db->prepare($sql);
        $sql->bindValue("fornecedor", $fornecedor); 

    }

}
?>