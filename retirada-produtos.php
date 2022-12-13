<?php
require_once "config.php";
require_once "./retirada-produtos/RetirarProdutos.php";

$prod_cardapio = new RetirarProdutos;

$prod_cardapios = $prod_cardapio->pegaCardapio();

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
    <link rel="stylesheet" href="./css/baixa_produtos.css">
    <link rel="stylesheet" href="./css/paginas.css">
    <title>Retirada de Produtos</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo">
        <h1>Retirada de Produtos</h1>
        <form method="GET" action="retirada-produtos/resumo.php">
            <label>Data</label>
            <input type="date" class="form-control" required>
            <label>Cardápio</label>
                <select class="form-control" name="cardapio" required> 
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach($prod_cardapios as $prod_cardapio):?>
                        <option value="<?php echo $prod_cardapio['id_cardapio'] ?>"><?php echo $prod_cardapio['nome_cardapio'] ?></option>
                    <?php endforeach; ?>    
                </select>
            <label>Turno</label>
                <select class="form-control" name="turno" required> 
                    <option value="" disabled selected>Selecione</option>
                    <option value="turno1">Turno 1</option>
                    <option value="turno2">Turno 2</option>
                    <option value="turno3">Turno 3</option>
                </select>
            <label>Quantidade de alunos</label>
            <input class="form-control" type="text" name="qtd-alunos" id="qtd-alunos" required>
            <button class="btn btn-success  btn-concluir">Concluir</button>
        </form>
    </div>

    <footer class="menurp"><a href="contato.php" class="paragrafo">-->Desenvolvido pela Segunda Turma do Curso Técnico de Informática<--</a></footer>

</body>