<?php
require_once "../config.php";
require_once "Cardapio.php";

$editar_cardapio = new Cardapio;

if(isset($_POST['id_item_card'])){
    $editar_cardapio->editarCardapio($id_item_card, $qtd_turno1, $qtd_turno2, $qtd_turno3);
}

?>