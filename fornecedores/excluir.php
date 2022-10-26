<?php
require_once "../config.php";
$id = $_GET['id'];
global $db;

$sql = "DELETE FROM fornecedor WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();

header("location: ../lista-fornecedor.php");