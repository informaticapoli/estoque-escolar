<?php
require_once "../config.php";
require_once "Cardapio.php";

$cardapio = new Cardapio;

if(isset($_GET['id']) && $_GET['id'] != ""){
    $id_cardapio = $_GET['id'];
    $infoCardapio = $cardapio->pegarNome($id_cardapio);
}else{
    header("Location: ../listar-cardapios.php");
}

if(isset($_POST['id_cardapio']) && $_POST['nome_cardapio'] != ""){
    $nome_cardapio = addslashes($_POST['nome_cardapio']);
    $id_cardapio = addslashes($_POST['id_cardapio']);
    $editar_nome = $cardapio->editarNomeCardapio($id_cardapio, $nome_cardapio);
}else{
    
}

if(isset($_POST['id_cardapio']) && isset($_POST['ativar'])){
    $id_cardapio = $_POST['id_cardapio'];
    $cardapio->ativarCardapio($id_cardapio);
}

if(isset($_POST['id_cardapio']) && isset($_POST['desativar'])){
    $id_cardapio = $_POST['id_cardapio'];
    $cardapio->desativarCardapio($id_cardapio);
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
    <script src="../js/jquery.js"></script>
    <!--<script src="./js/pesquisa_prod.js"></script>-->
    <script src="../js/editar_cardapio.js"></script>
    <script src="../js/datatables.js"></script>
    <script src="../js/mask.js"></script>
    <script src="../js/app.js"></script>
    <link rel="stylesheet" href="../css/cardapio.css">
    <title>Cadastrar Itens Cardápio</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "../menu.php";?>
    </div>
    <div class="fundo">
        <section class="cardapio">

            <div class="cardapio1">
                <h1>Itens do Cardápio</h1>
                    <div class="row">
                        <div class="campo_pesquisa col-md-11">
                        <button type="button" class="btn btn-success btn-add-prod" data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar Produto</button>
                    </div>
                    </div>     
                    <div class="row info-prod">
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="prod_nome" disabled>
                            <input type="hidden" id="prod_id" disabled>
                        </div>
                    </div>

                    <h3>Quantidade por pessoa em gramas</h3>

                    <input type="hidden" id="id_cardapio" value="<?php echo $id_cardapio ?>" disabled>

                    <div class="row colunasTurno">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Turno 1" disabled>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control peso" id="qtd_turno1" placeholder="Quantidade em gramas" id="prod_qtd">
                        </div>
                    </div>

                    <div class="row colunasTurno">
                        <div class="col-md-6">
                            <input type="text" class="form-control"placeholder="Turno 2" disabled>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control peso" id="qtd_turno2"  placeholder="Quantidade em gramas" id="prod_qtd">
                        </div>
                    </div>

                    <div class="row colunasTurno">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Turno 3" disabled>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control peso"  id="qtd_turno3"   placeholder="Quantidade em gramas" id="prod_qtd">
                        </div>
                    </div>     
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" id="adicionar_prod" class="btn btn-success btn-cad-prod">Adicionar</button>
                        </div>
                    </div>     
            </div>
            

            <div class="cardapio2">

                <h4>Cardápio: <?php echo $infoCardapio['nome_cardapio'] ?> <span id="editar_nome" class="btn btn-warning">Editar</span></h4>

                <div class="lista_produtos">
                    <table class="table table-striped">
                        <thead>
                            <th>Produtos</th>
                            <th>Turno 1</th>     
                            <th>Turno 2</th>    
                            <th>Turno 3</th>      
                        </thead>
                        <tbody id="produtos_cardapio">
                            
                        </tbody>
                    </table>
                </div>

                <?php if($infoCardapio['status'] == 0): ?>
                    <form method="POST">
                        <input type="hidden" name="id_cardapio" id="id_cardapio" value="<?php echo $id_cardapio ?>">
                        <button name="ativar" id="finalizar_cardapio" class="btn btn-success btn-finalizar">Ativar</button>
                        <a class="btn btn-warning btn-finalizar" href="../listar-cardapios.php">Voltar</a>
                    </form>
                <?php else: ?>
                    <form method="POST">
                        <input type="hidden" name="id_cardapio" id="id_cardapio" value="<?php echo $id_cardapio ?>">
                        <button name="desativar" id="finalizar_cardapio" class="btn btn-danger btn-finalizar">Desativar</button>
                        <a class="btn btn-warning btn-finalizar" href="../listar-cardapios.php">Voltar</a>
                    </form>
                <?php endif ?>

                
                
            </div>

            
        </section>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Produtos</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input id="pesquisar_prod" class="form-control form-prod" placeholder="Pesquise um produto para incluir" type="text">
                <table class="table table-striped">
                    <thead>
                        <th>Produtos</th>    
                    </thead>
                    <tbody class="resultado" data-bs-dismiss="modal">
                        
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editar_cardapio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Quantidades</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_item_card">
            <div class="row">
                <div class="col-md-12">
                    <label>Turno 1</label>
                    <input id="turno1" class="form-control peso" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Turno 2</label>
                    <input id="turno2" class="form-control peso" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Turno 3</label>
                    <input id="turno3" class="form-control peso" type="text">
                </div>
            </div>            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="excluir_prod_card">Excluir</button>
            <button type="submit" class="btn btn-success" id="editarCardapioAcao">Salvar</button>
        </div>
        </div>
    </div>
    </div>
    

     <!-- Modal -->
     <div class="modal fade" id="nome_cardapio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Nome Cardápio</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome do Cardápio:</label>
                            <input type="hidden" id="id_cardapio" name="id_cardapio" value="<?php echo $id_cardapio ?>" readonly>
                            <input id="nome_cardapio" name="nome_cardapio" value="<?php echo $infoCardapio['nome_cardapio'] ?>" class="form-control" type="text">
                        </div>
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" onclick="return confirm('Deseja alterar o nome do Cardápio?')" id="editarCardapioAcao">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>