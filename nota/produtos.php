<?php
require_once "../config.php";
require_once "Nota.php";

$nota = new Nota;

if(isset($_POST['prod_id'])){
    $prod_id = filter_input($_POST['prod_id']);
    $prod_qtd = filter_input($_POST['prod_qtd']);
    $prod_valor = filter_input($_POST['prod_valor']);
    $prod = $nota->adicionarProdutoNota($prod_id, $prod_qtd, $prod_valor);
}


echo json_encode($prod);

?>