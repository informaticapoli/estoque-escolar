<?php
require_once "../config.php";
require_once "Relatorios.php";

$relatorio = new Relatorios;

$data_inicial = null;
$data_final = null;
$turno = null;
$movimentacao = null;

if(isset($_GET['data-inicial']) && ($_GET['data-final']) && ($_GET['turno']) && ($_GET['movimentacao'])){
    $data_inicial = addslashes($_GET['data-inicial']);
    $data_final = addslashes($_GET['data-final']);
    $turno = addslashes($_GET['turno']);
    $movimentacao = addslashes($_GET['movimentacao']);

    $dados = $relatorio->relatorio($data_inicial, $data_final);
}


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
    <fieldset>
        <legend>Estoque</legend>
    </fieldset>
    <?php foreach($dados as $dado): ?>
        <div class="row">
            <div class="col-md-3">
                <span>Data de Entrada:</span>
                <?php echo date("d/m/Y", strtotime($dado['data_entrada']))?>
            </div>
            <div class="col-md-3">
                <span>Número da Nota:</span>
                <?php echo $dado['numero_nota']?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span>Fornecedor</span>
                <?php echo $dado['nome_fornecedor']?>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <th>Produto</th>
                <th>Quantidade</th>
            </thead>
            <tbody>
                <?php foreach($dado['produtos'] as $produto): ?>
                    <tr>
                        <td><?php echo $produto['nome_produto'] ?></td>
                        <td><?php echo $produto['qtd'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
   
</body>
</html>