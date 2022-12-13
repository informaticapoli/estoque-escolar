<?php
require_once "../config.php";
require_once "RetirarProdutos.php";

$prod_cardapio = new RetirarProdutos;

$id_cardapio = "";
$turno = "";
$qtd_alunos = "";

$id_cardapio = $_GET['cardapio'];

if($_GET['turno'] == "turno1"){
    $turno = "Turno Matutino";
}elseif($_GET['turno'] == "turno2"){
    $turno = "Turno Vespertino";
}elseif($_GET['turno'] == "turno3"){
    $turno = "Turno Noturno";
}else{
    $turno = "Turno não definido";
}

$qtd_alunos = $_GET['qtd-alunos'];

$cardapio = $prod_cardapio->pegaCardapioPeloID($id_cardapio);

$produtos = $prod_cardapio->resumoRetirada($id_cardapio);

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
    <link rel="stylesheet" href="../css/baixa_produtos.css">
    <title>Resumo de Retirada</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "../menu.php";?>
    </div>
    <div class="fundo">
        <h1>Resumo de Retirada</h1>
        <div class="titulos">
            <h4>Cardápio: <?php echo $cardapio['nome_cardapio'];?></h4>
            <h4>Turno: <?php echo $turno;?></h4>
            <h4>Quantidade de Alunos: <?php echo $qtd_alunos;?></h4>
        </div>
        
        <table class="table table-striped">
            <thead>
                <th>Itens Cardápio</th>
                <th>Quantidade por aluno</th>  
                <th>Quantidade total</th>           
            </thead>
            <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td> <?php echo $produto['nome_produto'] ?> </td>   
                        <td>
                            <?php
                                if($_GET['turno'] == "turno1"){
                                        echo $produto['qtd_mat']."g";
                                    }elseif($_GET['turno'] == "turno2"){
                                        echo $produto['qtd_vesp']."g";
                                    }elseif($_GET['turno'] == "turno3"){
                                        echo $produto['qtd_not']."g";
                                    }else{
                                        $turno = "Turno não definido";
                                }
                            ?>
                        </td>       
                        <td>
                            <?php
                                if($_GET['turno'] == "turno1"){
                                        $multi_mat = $produto['qtd_mat']*$qtd_alunos = $_GET['qtd-alunos'];
                                        echo $multi_mat."g";
                                    }elseif($_GET['turno'] == "turno2"){
                                        $multi_vesp = $produto['qtd_vesp']*$qtd_alunos = $_GET['qtd-alunos'];
                                        echo $multi_vesp."g";
                                    }elseif($_GET['turno'] == "turno3"){
                                        $multi_not = $produto['qtd_not']*$qtd_alunos = $_GET['qtd-alunos'];
                                        echo $multi_not."g";
                                    }else{
                                        $turno = "Turno não definido";
                                }
                            ?>
                        </td>            
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>