<?php

require_once "../config.php";
// require_once "../usuarios/Usuario.php";
require_once "../nota/Nota.php";

$nota = new Nota();
// $usuarios->check_login();

$id_nota = $_GET['id'];

$notas = $nota->select_nota($id_nota);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/paginas.css">
    <link rel="stylesheet" href="../css/estiloproduto.css">
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="../css/datatable.css">

    <title>EDITAR NOTA</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "../menu.php";?>
    </div>

    <div class="fundo">                       
        <div class="container">
            <fieldset>
                <legend> Editar Nota </legend>
                <form method="POST">
                    <div class="row">

                        <label>Nome Fornecedor</label>
                        <input type="text" class="form-control" name="id_fornecedor" value="<?php echo $notas['id_fornecedor']?>"/>

                        <label>Numero da Nota</label>
                        <input type="number" class="form-control" name="numero_nota" value="<?php echo $notas['numero_nota']?>"/>

                        <label>Data Entrada</label>
                        <input type="text" class="form-control" name="data_entrada" value="<?php echo $notas['data_entrada']?>"/> 
                    
                        <label>Valor Produto</label>
                        <input type="number" class="form-control" name="valor_produto" value="<?php echo $notas['valor_produto']?>"/>

                        <input type="hidden" name="id_nota" value="<?php echo $id_nota?>"/>
    
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>    
                </form>
            </fieldset>
        </div> 
    </div>
</body>
</html>