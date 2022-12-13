<?php
require_once "../config.php";
require_once "../retirada-produtos/RetirarProdutos.php";

$prod_cardapio = new RetirarProdutos;

$prod_cardapios = $prod_cardapio->pegaCardapio();

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
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="../css/paginas.css">
    <link rel="stylesheet" href="../css/fornecedor.css">
    <title>Relatórios</title>
</head>
<body>
    

    <div class="menu">  
        <?php require_once "../menu.php";?>
    </div>
        <div class="fundo-cad">

        </div>
            <fieldset>
                <legend> Relatório do Estoque</legend>
            </fieldset>
            <form action="relatorio.php" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label>Data Inicial:</label>
                        <input class="form-control" type="date" name="data-inicial" required>
                    </div>
                    <div class="col-md-4">
                        <label>Data Final:</label>
                        <input class="form-control" type="date" name="data-final" required>
                    </div>
                    <div class="col-md-4">
                        <label>Turno</label>
                        <select class="form-control" name="turno" required> 
                            <option value="" disabled selected>Selecione</option>
                            <option value="turno1">Turno 1</option>
                            <option value="turno2">Turno 2</option>
                            <option value="turno3">Turno 3</option>
                        </select>
                    </div>
                </div>
    
                
                
                
            </form>
</body>
</html>