<?php
require_once "config.php";
require_once "./cardapio/Cardapio.php";

$cardapio = new Cardapio;

if(isset($_POST['nome_cardapio'])){
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
    <script src="./js/jquery.js"></script>
    <script src="./js/pesquisa_prod.js"></script>
    <link rel="stylesheet" href="./css/cardapio.css">
    <title>Cadastrar Produtos NF</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo">
        <section class="cardapio">

            <div class="cardapio1">
                <h1>Itens do Cardápio</h1>
                <form method="POST">
                    <div class="row">
                        <div class="campo_pesquisa col-md-11">
                            <input id="pesquisar_prod" class="form-control form-prod" placeholder="Pesquise um produto para incluir" type="text">   
                            <div class="resultado">

                            </div>
                        </div>
                    </div>     
                    <div class="row info-prod">
                            <div class="col-md-11">
                                <input type="text" class="form-control" id="prod_nome" disabled>
                                <input type="hidden" id="prod_id" disabled>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <label>Quantidade:</label>
                            <input type="text" class="form-control" id="prod_qtd">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-cad-prod" id="adicionar_prod">Adicionar</button>
                        </div>
                    </div>
                </form>

                <h3>Quantidade por pessoa</h3>

                <div class="row colunasTurno">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Turno 1" disabled>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Quantidade" id="prod_qtd">
                    </div>
                </div>

                <div class="row colunasTurno">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Turno 2" disabled>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Quantidade" id="prod_qtd">
                    </div>
                </div>

                <div class="row colunasTurno">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Turno 3" disabled>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Quantidade" id="prod_qtd">
                    </div>
                </div>     
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-cad-prod" id="adicionar_prod">Salvar</button>
                    </div>
                </div>       
            </div>

            <div class="cardapio2">
        
                <table class="table">
                    <thead>
                        <th>Produtos</th>
                        <th>Quantidade</th>           
                    </thead>
                    <tbody id="produtos_cad">
                            <div></div>
                    </tbody>
                </table>
            </div>
                
        </section>

    </div>

    
</body>