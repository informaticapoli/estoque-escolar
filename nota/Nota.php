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

    private function pegarProdNota($id_nota){
        global $db;

        $produtos = array();

        $sql = "SELECT * FROM info_produtos_entrada WHERE id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();

        if($sql->rowCount()>0){
            $produtos = $sql->fetchAll();
            foreach($produtos as $produto){
                $this->verificarEstoque($produto['id_produto'],$produto['qtd']);
            }
        }
    }

    private function verificarEstoque($prod_id, $prod_qtd){

        global $db;

        $estoque = array();

        $sql = "SELECT * FROM estoque WHERE id_produto = :id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);
        $sql->execute();

        if($sql->rowCount()>0){
            $estoque = $sql->fetch();
        }

        if(count($estoque)>0){
            $prod_qtd = $prod_qtd + $estoque['qtn_produto'];
            $this->attEstoque($prod_id, $prod_qtd);
        }else{
            $this->addEstoque($prod_id, $prod_qtd);
        }

    }

    private function attEstoque($prod_id, $prod_qtd){
        global $db;

        $sql = "UPDATE estoque SET qtn_produto = :qtn_produto WHERE id_produto = :id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);
        $sql->bindValue(":qtn_produto", $prod_qtd);     
        $sql->execute();
    }

    private function addEstoque($prod_id, $prod_qtd){
        global $db;

        $sql = "INSERT INTO estoque SET id_produto = :id_produto, qtn_produto = :qtn_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod_id);
        $sql->bindValue(":qtn_produto", $prod_qtd);     
        $sql->execute();

        /*echo "<pre>";
        print_r($sql->errorInfo());
        exit;*/
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

        $sql = "SELECT *,produtos.nome_produto, SUM(info_produtos_entrada.qtd) AS quantidade_total, SUM(info_produtos_entrada.valor) AS valor_total FROM info_produtos_entrada
        INNER JOIN produtos ON info_produtos_entrada.id_produto = produtos.id_produto
        WHERE info_produtos_entrada.id_nota = :id_nota GROUP BY info_produtos_entrada.id_produto";
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

        /*$sql = "UPDATE entrada_nota SET status = 1 WHERE id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();*/
        $this->pegarProdNota($id_nota);

        header("Location: {$url}inicio.php");


    } 


     public function listando_nota(){
        global $db;
        $notas = array();
        $sql = "SELECT entrada_nota.id_nota, entrada_nota.id_fornecedor, fornecedor.nome_fornecedor FROM entrada_nota 
        INNER JOIN fornecedor ON entrada_nota.id_fornecedor = fornecedor.id_fornecedor";
        $sql = $db->prepare($sql);
        $sql->execute();
        $notas = $sql->fetchAll();
        return $notas;

        // echo '<pre>';print_r($sql->errorInfo());exit;
    }

    public function select_nota($id_nota){
        global $db;

        $notas = array();

        $sql = "SELECT entrada_nota.id_nota, entrada_nota.id_fornecedor, fornecedor.nome_fornecedor FROM entrada_nota 
        INNER JOIN fornecedor ON entrada_nota.id_fornecedor = fornecedor.id_fornecedor";
        $sql = $db->prepare($sql);
        $sql->execute();
        $notas = $sql->fetch();
        return $nota;

        // echo '<pre>';print_r($sql->errorInfo());exit;
    }

    public function editar_nota(){

        global $db;
        $notas = array();

        $id_nota=$_GET['id'];

        $id_fornecedor = $_POST['id_fornecedor'];
        $valor_produto = $_POST['valor_produto'];

        $sql = "UPDATE entrada_nota SET  id_fornecedor, :id_fornecedor, valor_produto = :valor_produto WHERE id_nota = :id_nota";

        // echo"<pre>"; print_r($sql->errorInfo()); exit;

        $sql = $db->prepare($sql);

        $sql->bindValue(":id_fornecedor", $id_fornecedor);
        $sql->bindValue(":valor_produto", $valor_produto);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();
    
         header("Location: http://localhost/estoque-escolar/listar-nota.php");

        //  echo "<pre>"; print_r($sql->errorInfo()); exit;

    }

}
?>


        "SELECT entrada_nota.id_nota,entrada_nota.id_fornecedor, fornecedor.nome_fornecedor, FROM entrada_nota 
        INNER JOIN fornecedor ON entrada_nota.id_fornecedor = fornecedor.id_fornecedor
        INNER JOIN entrada_nota ON entrada_nota.id_fornecedor = entrada_nota.id_fornecedor"
        

        "SELECT produtos.id_produto, produtos.nome_produto, produtos.unidade_medida, produtos.data_validade, produtos.id_nota, 
        produtos.id_fornecedor, produtos.id_recurso, fornecedor.nome_fornecedor, recurso.nome_recurso FROM produtos 
        INNER JOIN fornecedor ON produtos.id_fornecedor = fornecedor.id_fornecedor
        INNER JOIN recurso ON produtos.id_recurso = recurso.id_recurso"