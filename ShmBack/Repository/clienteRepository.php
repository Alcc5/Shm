<?php
/* header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); */

include "CheckLogin.php";
include "Model/cliente.php";

class ClienteRepository {

    public function findAll(){
        try {
            $sql = "SELECT `*` FROM `SHM_Clientes`";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();    
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $result  = array();
            if ($stmt->execute()) {
                while ($rs = $stmt->fetchObject(Cliente::class)) {
                    $result[] = $rs;
                }
            }
            if (count($result) > 0) {
                return $result;
            }
            
        } catch (Exception $e){
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }

        return false;
    }

    public function save(Cliente $cliente){
        try {
            $sql = "INSERT INTO `SHM_Clientes` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, NULL);  
            $stmt->bindValue(2, 1);
            $stmt->bindValue(3, $cliente->getCnpj());
            $stmt->bindValue(4, $cliente->getNomeFantasia());
            $stmt->bindValue(5, $cliente->getRazaoSocial());
            $stmt->bindValue(6, $cliente->getEndereco());
            $stmt->bindValue(7, $cliente->getComplemento());
            $stmt->bindValue(8, $cliente->getBairro());
            $stmt->bindValue(9, $cliente->getCidade());
            $stmt->bindValue(10, $cliente->getEstado());
            $stmt->bindValue(11, $cliente->getCep());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }
    }

    public function update(Cliente $cliente){
        try {
            $sql = "UPDATE `SHM_Clientes` SET `nomeFantasia` = ?, `razaoSocial` = ?, `endereco` = ?, `complemento` = ?, `bairro` = ?, `cidade` = ?, `estado` = ?, `cep` = ? WHERE `id` = ?";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$cliente->getNomeFantasia());
            $stmt->bindParam(2,$cliente->getRazaoSocial());
            $stmt->bindParam(3,$cliente->getEndereco());
            $stmt->bindParam(4,$cliente->getComplemento());
            $stmt->bindParam(5,$cliente->getBairro());
            $stmt->bindParam(6,$cliente->getCidade());
            $stmt->bindParam(7,$cliente->getEstado());
            $stmt->bindParam(8,$cliente->getCep());

            $stmt->bindParam(9,$cliente->getId());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        finally{
            $db = null;
        }
    }

    public function delete($id){
        try {
            $sql = "CALL SP_ativaCliente(?)";
/*             $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
            if ( ! session_id() ) @ session_start(); */
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$id);

            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        finally{
            $db = null;
        }
    }


    //André [2020-09-21 10:10:27]: Implementar o Pattern Builder
}
?>