<?php
class Fornecedor{

    public function cadastrar(){
        $fornecedor = $_POST['fornecedor'];
        $endereco = $_POST['endereco'];
        $contato = $_POST['contato'];
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];
        $email = $_POST['email'];
        $cnpj = $_POST['cnpj'];

        global $db;

        if($this->verificar_cnpj($cnpj)){
            $sql = "INSERT INTO fornecedor SET nome_fornecedor = :fornecedor, endereco_fornecedor = :endereco, cnpj = :cnpj, contato_fornecedor = :contato, telefone1 = :telefone1, telefone2 = :telefone2, e_mail = :email";
            $sql = $db->prepare($sql);
            $sql->bindValue(":fornecedor", $fornecedor); 
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":contato", $contato);
            $sql->bindValue(":telefone1", $telefone1);
            $sql->bindValue(":telefone2", $telefone2);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":cnpj", $cnpj);
    
            $sql->execute();
    
            header("Location: {$url}inicio.php");
        }else{
            echo "Já existe esse CNPJ";
            exit;
        }

        //print_r($sql->errorInfo());
        //exit;

    }

    private function verificar_cnpj($cnpj){

        global $db;

        $sql = "SELECT cnpj FROM fornecedor WHERE cnpj = :cnpj";
        $sql = $db->prepare($sql);
        $sql->bindValue(":cnpj", $cnpj);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            return true;
        }
    }

}
?>