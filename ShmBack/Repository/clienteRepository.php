<?php
/* header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); */

include "CheckLogin.php";
include "Model/cliente.php";

class ClienteRepository {

    public function save(Cliente $cliente){
        try {
            $sql = "INSERT INTO `SHM_Clientes` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue("1", $cliente->getId());  
            $stmt->bindValue("2", $cliente->getAtivo());
            $stmt->bindValue("3", $cliente->getCnpj());
            $stmt->bindValue("4", $cliente->getNomeFantasia());
            $stmt->bindValue("5", $cliente->getRazaoSocial());
            $stmt->bindValue("6", $cliente->getEndereco());
            $stmt->bindValue("7", $cliente->getComplemento());
            $stmt->bindValue("8", $cliente->getBairro());
            $stmt->bindValue("9", $cliente->getCidade());
            $stmt->bindValue("10", $cliente->getEstado());
            $stmt->bindValue("11", $cliente->getCep());
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->errorMessage();
        }
    }

    public function findAllClients(){
        try {
            $sql = "SELECT `nomeFantasia`, `cidade`, `ativo` FROM `SHM_Clientes`";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);    
            $stmt->execute();
            return constroiCliente($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e){
            echo $e->errorMessage();
        }
    }

/*     private function constroiCliente($row) {
        $pojo = new Cliente();
        $pojo->setNomeFantasia($row['nomeFantasia']);
        $pojo->setCidade($row['cidade']);
        $pojo->setAtivo($row['ativo']);
        return $pojo;
    } */
}
?>