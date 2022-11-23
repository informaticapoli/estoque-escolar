<?php
require_once "../config.php";
require_once "Fornecedor.php";
global $db;

$fornecedor = new Fornecedor();

$info_fornecedor= $fornecedor->info_fornecedor();

if(isset($_POST["contato"])){
    $fornecedor->editarFornecedor();
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
    <link rel="stylesheet" href="../css/paginas.css">
    <link rel="stylesheet" href="../css/fornecedor.css">
    <title>Cadastrar Fornecedor</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "../menu.php";?>
    </div>
    <div class="fundo-editar-forn">
        <h1>Editar Fornecedores</h1>
        <form class="container" method="POST">
            <label>Fornecedor:</label>
            <input class="form-control" type="text" name="fornecedor" value="<?php echo $info_fornecedor['nome_fornecedor']?>" required >

            <label>CNPJ:</label>
            <input  class="form-control" type="text" name="cnpj" value="<?php echo $info_fornecedor['cnpj']?>" required>

            <label>Endereço:</label>
            <input class="form-control" type="text" name="endereco" value="<?php echo $info_fornecedor['endereco_fornecedor']?>" required>

            <label>Contato:</label>
            <input class="form-control" type="text" name="contato" value="<?php echo $info_fornecedor['contato_fornecedor']?>" required>

            <label>Telefone 1:</label>
            <input class="form-control" type="text" name="telefone1" value="<?php echo $info_fornecedor['telefone1']?>" required>

            <label>Telefone 2:</label> 
            <input class="form-control" type="text" name="telefone2" value="<?php echo $info_fornecedor['telefone2']?>" required>

            <label>E-mail:</label>
            <input class="form-control" type="text" name="email" value="<?php echo $info_fornecedor['e_mail'] ?>">
            <input type="hidden" name="id" value="<?php echo $info_fornecedor['id_fornecedor']?>">

           <br/>
            <a href="../lista-fornecedor.php" class="btn btn-voltar btn-warning ">Voltar</a>
            <button class="btn btn-voltar btn-success" type="submit">Editar</button>

        </form>
            
            
    </div>
</body>
</html>