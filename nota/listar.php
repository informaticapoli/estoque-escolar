<?php
require_once "../config.php";
require_once "Nota.php";

$nota = new Nota;

$resposta = array();

if(isset($_POST['prod_id'])){
    $exibir_prod = $nota->exibir_prod_nota($id_nota);
}

$resposta['produtos'] = $exibir_prod;

echo json_encode($resposta);

?>