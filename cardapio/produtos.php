<?php
require_once "../config.php";
require_once "Cardapio.php";

$cardapio = new Cardapio;

$prod = array();

if(isset($_POST['prod_id'])){
    $prod_id = addslashes($_POST['prod_id']);
    $qtd_turno1 = addslashes($_POST['qtd_turno1']);
    $qtd_turno2 = addslashes($_POST['qtd_turno2']);
    $qtd_turno3 = addslashes($_POST['qtd_turno3']);
    $id_cardapio = addslashes($_POST['id_cardapio']);
    $prod = $cardapio->adicionar_prod_cardapio($prod_id, $qtd_turno1, $qtd_turno2, $qtd_turno3, $id_cardapio);
    //$exibir_prod = $cardapio->exibir_prod_cardapio($id_cardapio);
};



$retorno = array();
$retorno["sucesso"] = $prod;
//$retorno["produtos"] = $exibir_prod;

//echo "<pre>";
//print_r($retorno);
//exit;

echo json_encode($retorno);

?>