<?php
require_once "../config.php";
require_once "Cardapio.php";

$item_card = new Cardapio;

$resposta = array();

if(isset($_POST['id_item_card'])){
    $id_item_card = $_POST['id_item_card'];
    $item = $item_card->excluir_prod_card($id_item_card);
}

$resposta['sucesso']=$item;

echo json_encode($resposta);

?> 