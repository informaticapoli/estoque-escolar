<?php

require_once "./config.php";
require_once "./produtos/Produto.php";
require_once "./fornecedores/Fornecedor.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$produto = new Produto();
$fornecedor = new Fornecedor();
$usuarios->check_login();

$id_produto = $_GET['id'];
$produtos = $produto->info_produto($id_produto);
// print_r($produtos);

if (isset($_POST['id_produto'])) {
    $produto->editar($id_produto);
}

$fornecedores = $fornecedor->listarFornecedores();
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
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/estiloproduto.css">
    <title>Entrada</title>
</head>
<body>

    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>  


    <div class="fundo">           
            
        <div class="container">
            <fieldset>
                <legend> Editar Produto </legend>
                <form method="POST">
                    <div class="row">
                        <label>Nome Produto</label>
                        <input type="text" class="form-control" name="nome_produto" value="<?php echo utf8_encode ($produtos['nome_produto'])?>"/>
                        
                            <label>Unidade Medida</label>
                            <input type="text" class="form-control" name="unidade_medida" value="UN" desabled/>

                        <label>Data Validade</label>
                        <input type="text" class="form-control" name="data_validade" value="<?php echo utf8_encode ($produtos['data_validade'])?>"/> 

                        <label>Fornecedor</label>
                            <select class="form-control" name="id_fornecedor"> 
                                <option value="">Selecione</option>
                                <?php foreach($fornecedores as $fornecedor):?>
                                    <option <?php echo ($produtos['id_fornecedor'] == $fornecedor['id_fornecedor'] ? "selected" : ""); ?> value="<?php echo $fornecedor['id_fornecedor'] ?>"><?php echo 
                                    utf8_encode ($fornecedor['nome_fornecedor'])?></option>
                                <?php endforeach;?>    
                            </select>
                    
                        <label>id Recurso</label>
                        <input type="number" class="form-control" name="id_recurso" value="<?php echo utf8_encode($produtos['id_recurso'])?>"/>

                        <input type="hidden" name="id_produto" value="<?php echo $id_produto ?>"/>

                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div> 
                    
                        <div class="row box">
                            <div class="col-md-6">
                            <a href="./inicio.php" class="btn btn-warning">Voltar</a>
                    
                            </div>
                        </div>
                </form>
            </fieldset>
        </div> 
    </div>
</body>
</html>



<!-- 
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
                            <input type="text" class="form-control" name="id_fornecedor" value="<?php echo $nota['id_fornecedor']?>"/>
    
                            <label>Numero da Nota</label>
                            <input type="text" class="form-control" name="numero_nota" value="<?php echo $nota['numero_nota']?>"/>
    
                            <label>Data Entrada</label>
                            <input type="text" class="form-control" name="data_entrada" value="<?php echo $nota['data_entrada']?>"/> 
                        
                            <label>Valor Produto</label>
                            <input type="number" class="form-control" name="valor_produto" value="<?php echo $nota['valor_produto']?>"/>
        
                            <button type="submit" class="btn btn-success">Atualizar</button>
                        </div>    
                    </form>
                </fieldset>
            </div> 
        </div> -->