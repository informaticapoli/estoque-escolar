<?php
require_once "../config.php";
require_once "Produto.php";

$produto = new Produto;

$texto = $_GET['palavra'];

$prod = $produto->pesquisar_prod($texto);

echo json_encode($prod);
?>