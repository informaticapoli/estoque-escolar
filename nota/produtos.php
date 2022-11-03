<?php
require_once "../config.php";
require_once "Nota.php";

$nota = new Nota;

if(isset($_POST['prod_id'])){
    $prod_id = addslashes($_POST['prod_id']);
    $id_nota = addslashes($_POST['id_nota']);
    $prod_qtd = addslashes($_POST['prod_qtd']);
    $prod_valor = addslashes($_POST['prod_valor']);
    $prod = $nota->adicionar_prod_nota($prod_id, $id_nota, $prod_qtd, $prod_valor);
    $exibir_prod = $nota->exibir_prod_nota($id_nota);
}

$retorno = array();
$retorno["sucesso"] = $prod;
$retorno["produtos"] = $exibir_prod;

//echo "<pre>";
//print_r($retorno);
//exit;

echo json_encode($retorno);

?>