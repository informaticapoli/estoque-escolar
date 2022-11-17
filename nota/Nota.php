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
        $id_nota = $db->lastInsertId();

        header("Location: {$url}cad-prod-nota.php?id=$id_nota");
    }

    public function adicionar_prod_nota($prod_id, $id_nota, $prod_qtd, $prod_valor){

        global $db;

        $sql = "INSERT INTO info_produtos_entrada SET id_produto = :id_produto, id_nota = :id_nota, qtd = :qtd, valor = :valor";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);   
        $sql->bindValue(":id_nota", $id_nota);    
        $sql->bindValue(":qtd", $prod_qtd);     
        $sql->bindValue(":valor", $prod_valor); 
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

    public function exibir_prod_nota($id_nota){
        global $db;

        $exibir_prod = array();

        $sql = "SELECT *,produtos.nome_produto FROM info_produtos_entrada INNER JOIN produtos ON info_produtos_entrada.id_produto = produtos.id_produto WHERE info_produtos_entrada.id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $exibir_prod = $sql->fetchAll();
        }


        return $exibir_prod;
        
    }

    public function excluir_prod_nota($id){ 
        global $db;
        
        $sql = "DELETE FROM info_produtos_entrada WHERE id_info=:id";
        $sql = $db -> prepare($sql);
        $sql->bindValue(":id", $id);
        $sql -> execute();

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function finalizarNota($id_nota){
        global $db;

        $sql = "UPDATE entrada_nota SET status = 1 WHERE id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();

        header("Location: {$url}inicio.php");
    } 


     public function listando_nota(){
        global $db;
        $notas = array();
        $sql = "SELECT * FROM entrada_nota";
        $sql = $db->prepare($sql);
        $sql->execute();
        $notas = $sql->fetchAll();
        return $notas;

        // echo '<pre>';print_r($sql->errorInfo());exit;
    }

    // public function editar(){

    //     global $db;
    //     $notas = array();

    //     $id_nota=$_GET['id'];
    //     $id_fornecedor = $_POST['id_fornecedor'];
    //     $numero_nota = $_POST['numero_nota'];
    //     $data_entrada = $_POST['data_entrada'];
    //     $valor_produto = $_POST['valor_produto'];

    //     $sql = "UPDATE entrada_nota SET  id_fornecedor = :id_fornecedor, numero_nota = :numero_nota, data_entrada = :data_entrada, valor_produto = :valor_produto WHERE id_nota = :id_nota";

    //     // echo"<pre>"; print_r($sql->errorInfo()); exit;

    //     $sql = $db->prepare($sql);
    //     $sql->bindValue(":id_fornecedor", $id_fornecedor);
    //     $sql->bindValue(":numero_nota", $numero_nota);
    //     $sql->bindValue(":data_entrada", $data_entrada);
    //     $sql->bindValue(":valor_produto", $valor_produto);
    //     $sql->bindValue(":id_nota", $id_nota);
    //     $sql->execute();
    
    //     // header("Location: listar-notas.php");

    //     // echo "<pre>"; print_r($sql->errorInfo()); exit;

    // }

    public function select_nota($id_nota){
        global $db;

        $nota = array();

        $sql = "SELECT * FROM entrada_nota WHERE id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();
        $nota = $sql->fetch();
        return $nota;

        // echo '<pre>';print_r($sql->errorInfo());exit;
    }
}

?>
