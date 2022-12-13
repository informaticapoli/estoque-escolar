<?php
require_once "../config.php";
require_once "Cardapio.php";

$item_card = new Cardapio;

$resposta = array();

if(isset($_POST['id_item_card'])){
    $id_item_card = $_POST['id_item_card'];
    $item = $item_card->exibir_item_cardapio($id_item_card);
}

$resposta['produtos']=$item;

echo json_encode($resposta);

?> 