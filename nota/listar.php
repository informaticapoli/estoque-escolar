<?php
require_once "../config.php";
require_once "Nota.php";

$nota = new Nota;

$resposta = array();

if(isset($_POST['id_nota'])){
    $id_nota = addslashes($_POST['id_nota']);
    $exibir_prod = $nota->exibir_prod_nota($id_nota);
}
    //echo "<pre>";
    //print_r($exibir_prod);
    //exit;

$resposta['produtos'] = $exibir_prod;

echo json_encode($resposta);

?>