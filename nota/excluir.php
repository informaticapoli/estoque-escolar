<?php
require_once "../config.php";
require_once "Nota.php";

$nota = new Nota;

$resposta = array();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $prod = $nota->excluir_prod_nota($id);
}

$resposta['sucesso'] = $prod;

echo json_encode($resposta);

?>