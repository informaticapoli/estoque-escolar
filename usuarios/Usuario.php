<?php
class Usuario{
    public function logar($usuario, $senha){

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $dado_usuario = array();

        global $db;

        $sql="SELECT id, usuario, senha FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        $sql = $db->prepare($sql);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

        if($sql->rowCount() > 0){
            $dado_usuario = $sql->fetch();
            $_SESSION["token"] = $this->gerar_token($dado_usuario["id"]);
            header("Location: index.php");
        }else{
            $_SESSION["alerta_erro"] = "Usuário ou senha inválidos";
        }
    }

    private function gerar_token($id){
        $token = md5(date("Y-m-d H:i:s").$id);

        global $db;

        $sql = "UPDATE usuarios SET token = :token WHERE id = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":token", $token);
        $sql->execute();

        return $token;
    }

    public function check_login(){
        if(isset($_SESSION['token'])){
            $token = $_SESSION['token'];

            global $db;

            $sql = "SELECT token FROM usuarios WHERE token = :token";
            $sql = $db->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();

            if($sql->rowCount() > 0){

            }else{
                header("Location: login.php");
            }
        }else{
            header("Location: login.php");
            exit;
        }
    }

    
}
?>