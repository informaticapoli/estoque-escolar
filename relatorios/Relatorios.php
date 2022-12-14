<?php
require_once "../config.php";

class Relatorios{
    public function relatorio($data_inicial, $data_final){

        global $db;

        $notas = array();

        $sql = "SELECT *,fornecedor.nome_fornecedor FROM entrada_nota
        INNER JOIN fornecedor ON entrada_nota.id_fornecedor = fornecedor.id_fornecedor
        WHERE data_entrada >= :data_inicial AND data_entrada <= :data_final ORDER BY data_entrada";
        $sql = $db->prepare($sql);
        $sql->bindValue(":data_inicial", $data_inicial );  
        $sql->bindValue(":data_final", $data_final );  
        $sql->execute();

        if($sql->rowCount() > 0){
            $notas = $sql->fetchAll();
            $i = 0;
            foreach($notas as $nota){
                $notas[$i]['produtos'] = $this->pegarProdutosEntrada($nota['id_nota']);
                $i = $i+1;
            }
        }
        /*echo "<pre>";
        print_r($notas);
        exit;*/
        return $notas;
    }

    private function pegarProdutosEntrada($id_nota){

        global $db;

        $produtosEntrada = array();

        $sql = "SELECT *,produtos.nome_produto FROM info_produtos_entrada
        INNER JOIN produtos ON info_produtos_entrada.id_produto = produtos.id_produto WHERE info_produtos_entrada.id_nota = :id_nota";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_nota", $id_nota);
        $sql->execute();
    
        if($sql->rowCount() > 0){
            $produtosEntrada = $sql->fetchAll();
        }
        return $produtosEntrada;
    }
}

?>