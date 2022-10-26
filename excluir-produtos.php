<?php
require_once "config.php";
$id_produto = $_GET['id'];
global $db;
$sql = "DELETE FROM produtos WHERE id_produto = :id_produto";
$sql = $db->prepare($sql);
$sql->bindValue(":id_produto", $id_produto);
$sql->execute();
$dados = $sql->fetchALL();
?>