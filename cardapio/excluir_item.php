<?php
require_once "../config.php";
require_once "Cardapio.php";

$item_card = new Cardapio;

$reposta = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $item = $item_card->excluir_prod_cardapio($id);
}

$reposta["sucesso"] = $item;

echo json_encode($reposta);

?>