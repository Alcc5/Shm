<?php

require_once("CheckLogin.php");
require_once("Model/prestador.php");

class PrestadorRepository {

    public static function findAll(){
        try {
            $sql = "SELECT `*` FROM `SHM_Prestadores`";
            $connection = new Conn();    
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $result  = array();
            if ($stmt->execute()) {
                while ($rs = $stmt->fetchObject(Prestador::class)) {
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

    public static function save(Prestador $prestador){
        try {
            $sql = "INSERT INTO `SHM_Prestadores` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, NULL);  
            $stmt->bindValue(2, 1);
            $stmt->bindValue(3, $prestador->getCpf());
            $stmt->bindValue(4, $prestador->getCrm());
            $stmt->bindValue(5, $prestador->getNome());
            $stmt->bindValue(6, $prestador->getEmail());
            $stmt->bindValue(7, $prestador->getEndereco());
            $stmt->bindValue(8, $prestador->getComplemento());
            $stmt->bindValue(9, $prestador->getBairro());
            $stmt->bindValue(10, $prestador->getCidade());
            $stmt->bindValue(11, $prestador->getEstado());
            $stmt->bindValue(12, $prestador->getCep());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }
    }

    public static function update(Prestador $prestador){
        try {
            $sql = "UPDATE `SHM_Prestadores` SET `nome` = ?, `email` = ?, `endereco` = ?, `complemento` = ?, `bairro` = ?, `cidade` = ?, `estado` = ?, `cep` = ? WHERE `id` = ?";
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$prestador->getNome());
            $stmt->bindParam(2,$prestador->getEmail());
            $stmt->bindParam(3,$prestador->getEndereco());
            $stmt->bindParam(4,$prestador->getComplemento());
            $stmt->bindParam(5,$prestador->getBairro());
            $stmt->bindParam(6,$prestador->getCidade());
            $stmt->bindParam(7,$prestador->getEstado());
            $stmt->bindParam(8,$prestador->getCep());

            $stmt->bindParam(9,$prestador->getId());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        finally{
            $db = null;
        }
    }

    public static function delete($id){
        try {
            $sql = "CALL SP_ativaPrestador(?)";
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