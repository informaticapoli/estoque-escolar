<?php
require_once "../config.php";
require_once "Produto.php";

$produto = new Produto;

$select_prod = $_GET['id_produto'];

$prod = $produto->select_prod($select_prod);

echo json_encode($prod);
?>