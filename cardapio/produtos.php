<?php
require_once "../config.php";
require_once "Cardapio.php";

$nota = new Cardapio;

$prod = array();

if(isset($_POST['prod_id'])){
    $prod_id = addslashes($_POST['prod_id']);
    $qtd_mat = addslashes($_POST['qtd_mat']);
    $qtd_vesp = addslashes($_POST['qtd_vesp']);
    $qtd_not = addslashes($_POST['qtd_not']);
    $prod = $nota->adicionar_prod_cardapio($prod_id, $qtd_mat, $qtd_vesp, $qtd_not);
    //$exibir_prod = $nota->exibir_prod_nota($id_nota);
};

echo json_encode($prod);

/*$retorno = array();
$retorno["sucesso"] = $prod;
$retorno["produtos"] = $exibir_prod;

//echo "<pre>";
//print_r($retorno);
//exit;

echo json_encode($retorno);
*/
?>