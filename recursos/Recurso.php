<?php
class Recurso{

    public function pegarecursos(){
        
        global $db;

        $recursos = array();

        $sql = "SELECT * FROM recurso";
        $sql = $db->prepare($sql);
        $sql->execute();
        $recursos = $sql->fetchAll();
        return $recursos;
        // print_r($sql->errorInfo());exit; 

    }
}
?>