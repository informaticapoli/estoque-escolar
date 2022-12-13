<?php
require_once "../config.php";
require_once "Cardapio.php";

$item_card = new Cardapio;

$resposta = array();

if(isset($_POST['id_cardapio'])){
    $id_cardapio = $_POST['id_cardapio'];
    $item = $item_card->exibir_prod_cardapio($id_cardapio);
}

$resposta['produtos']=$item;

echo json_encode($resposta);


?> 