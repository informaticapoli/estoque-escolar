<?php
require_once "config.php";
require_once "./cardapio/Cardapio.php";

$cardapio = new Cardapio;

$cardapios = $cardapio->exibir_cardapio();

//echo "<pre>";
//print_r($cardapios);


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
    <script src="./js/jquery.js"></script>
    <!--<script src="./js/pesquisa_prod.js"></script>-->
    <script src="./js/cardapio.js"></script>
    <script src="./js/datatables.js"></script>
    <script src="./js/mask.js"></script>
    <script src="./js/app.js"></script>
    <link rel="stylesheet" href="./css/cardapio.css">
    <title>Lista de Cardápios</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo">
        <h1>Lista de Cardápios</h1>
        <div class="listaCardapio">
            <table class="table table-striped">
                <thead>
                    <th>Cardápio</th>   
                    <th>Status</th>  
                    <th></th>
                </thead>
                <tbody id="cardapios">
                    <?php foreach($cardapios as $cardapio):?>
                        <tr>
                            <td style="width:70%"><?php echo $cardapio['nome_cardapio'] ?></td>
                            <td style="width:15%"><?php echo($cardapio['status']==0?"Desativado":"Ativo") ?></td>
                            <td style="width:15%"><button class="btn btn-warning">Editar</button></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>