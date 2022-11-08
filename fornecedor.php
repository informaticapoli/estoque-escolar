<?php 
require_once "config.php";
require_once "./fornecedores/Fornecedor.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$usuarios->check_login();

$fornecedor = new Fornecedor();


if(isset($_POST['fornecedor']) && ($_POST['fornecedor']) != "" && ($_POST['endereco']) && ($_POST['endereco']) != ""){
    $fornecedor->cadastrar();
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
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/fornecedor.css">
    <title>Cadastrar Fornecedor</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo-cad">
        <h1>Cadastrar Fornecedor</h1>
        <form class="container" method="POST">
            <label>Fornecedor:</label>
            <input class="form-control" type="text" name="fornecedor" required>
            <label>CNPJ:</label>
            <input  class="form-control cnpj" type="text" name="cnpj" required>
            <label>Endereço:</label>
            <input class="form-control" type="text" name="endereco" required>
            <label>Contato:</label>
            <input class="form-control" placeholder="Informe o nome do responsavel" type="text" name="contato" required>
            <label>Telefone 1:</label>
            <input class="form-control telefone_add" type="text" name="telefone1" required>
            <label>Telefone 2:</label> 
            <input class="form-control telefone_add" type="text" name="telefone2">
            <label>E-mail:</label>
            <input class="form-control" type="email" name="email">
            
            <button class="btn btn-cadastrar btn-success" type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>