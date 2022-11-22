<?php
require_once "config.php";
require_once "Cardapio.php";

$retorno = array();

$retorno["sucesso"]=true;

$cardapio = new Cardapio;

if(isset($_POST['id_cardapio'])){
    $id_cardapio = addslashes($_POST['id_cardapio']);
    $pegar_prod=$cardapio->exibir_prod_cardapio($id_cardapio);
    $retorno["produtos"]=$pegar_prod;
}else{
    $retorno["sucesso"]=false;
}

?>