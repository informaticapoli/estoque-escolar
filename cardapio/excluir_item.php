<?php
require_once "../config.php";
require_once "Cardapio.php";

$item_card = new Cardapio;

$resposta = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $item = $item_card->excluir_prod_cardapio($id);
}

$resposta["sucesso"] = $item;

echo json_encode($resposta);

?>