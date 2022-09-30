<?php

$banco = "estoque_escolar";
$usuario = "root";
$senha ="";
$host = "localhost";
$url = 'http://localhost/estoque-escolar/';


global $db;

try {
    $db = new PDO("mysql:host=". $host .";dbname=" . $banco, $usuario, $senha);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>