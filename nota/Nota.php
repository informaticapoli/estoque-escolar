<?php
class Nota{
    public function cadastrar_nota(){
        $fornecedor = $_POST['id_fornecedor'];
        $num_nota = $_POST['num_nota'];
        $recurso = $_POST['recurso'];
        $total_nf = $_POST['total_nf'];

        global $db;

        $sql = "INSERT INTO entrada_nota SET id_fornecedor = :id_fornecedor, numero_nota = :num_nota, id_recurso = :recurso, total_nota = :total_nf";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_fornecedor", $fornecedor);
        $sql->bindValue(":num_nota", $num_nota);
        $sql->bindValue(":recurso", $recurso);
        $sql->bindValue(":total_nf", $total_nf);        
        $sql->execute();

        header("Location: {$url}cad-prod-nota.php");
    }

    public function adicionar_prod_nota($prod_id, $prod_qtd, $prod_valor){

        global $db;

        $sql = "INSERT INTO info_prod_entrada SET id_produto = :id_produto, qtd = :qtd, valor = :valor";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);      
        $sql->bindValue(":qtd", $prod_qtd);     
        $sql->bindValue(":valor", $prod_valor); 
        $sql->execute();

        echo "<pre>";
        print_r($sql->errorInfo());
        exit;
    }
    
}


?>
