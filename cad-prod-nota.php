<?php
require_once "config.php";


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
    <script src="./js/jquery.js"></script>
    <script src="./js/pesquisa_prod.js"></script>
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/cad-nota.css">
    <title>Cadastrar Produtos NF</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo-cad-nota">
        <h1>Cadastrar Produtos da Nota Fiscal</h1>
        <form class="container" method="POST">
            <label></label>
            <input id="pesquisar_prod" type="text">                        
            <button class="btn btn-cadastrar btn-success" type="submit">Finalizar cadastro</button>
        </form>
    </div>
</body>
</html>