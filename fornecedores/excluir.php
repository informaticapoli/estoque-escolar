<?php
require_once "../config.php";
require_once "Fornecedor.php";

$fornecedor = new Fornecedor();
$id = $_GET['id_fornecedor'];
$fornecedor->excluirFornecedor($id);
?>