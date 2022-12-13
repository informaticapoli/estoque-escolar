<?php
require_once "../config.php";
require_once "Cardapio.php";

$editar_cardapio = new Cardapio;

$retorno = array();

if(isset($_POST['id_item_card'])){
    $id_item_card = $_POST['id_item_card'];
    $turno1 = $_POST['turno1'];
    $turno2 = $_POST['turno2'];
    $turno3 = $_POST['turno3'];
    $retorno["sucesso"] = $editar_cardapio->editarCardapio($id_item_card, $turno1, $turno2, $turno3);
}else{
    $retorno["sucesso"] = false;
}

echo json_encode($retorno);

?>