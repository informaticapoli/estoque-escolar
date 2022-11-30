<?php
require_once "config.php";
require_once "./cardapio/Cardapio.php";

$cardapio = new Cardapio;

if(isset($_POST['nome_cardapio']) && $_POST['nome_cardapio'] != ""){
    $nome_card = $_POST['nome_cardapio'];
    $cardapio->cadCardapio($nome_card);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/cardapio.css">
    <title>Cadastrar Cardápio</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo">
        <h1>Cardápio</h1>
        <form class="form_card" method="POST">
            <label>Nome do Cardápio:</label>
            <input type="text" class="form-control" name="nome_cardapio">

            <button class="btn btn-cardapio btn-success" type="submit">Próxima etapa</button>
        </form>
    </div>
</body>