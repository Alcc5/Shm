<?php

require_once("CheckLogin.php");
require_once("Model/pontoAtendimento.php");

class PontoAtendimentoRepository {

    public function findAll(){
        try {
            $sql = "SELECT `*` FROM `SHM_PontosAtend`";
            $connection = new Conn();    
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $result  = array();
            if ($stmt->execute()) {
                while ($rs = $stmt->fetchObject(PontoAtendimento::class)) {
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

    public function save(PontoAtendimento $pontoAtendimento){
        try {
            $sql = "INSERT INTO `SHM_PontosAtend` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, NULL);  
            $stmt->bindValue(2, 1);
            $stmt->bindValue(3, $pontoAtendimento->getCnpj());
            $stmt->bindValue(4, $pontoAtendimento->getNomeFantasia());
            $stmt->bindValue(5, $pontoAtendimento->getRazaoSocial());
            $stmt->bindValue(6, $pontoAtendimento->getEndereco());
            $stmt->bindValue(7, $pontoAtendimento->getComplemento());
            $stmt->bindValue(8, $pontoAtendimento->getBairro());
            $stmt->bindValue(9, $pontoAtendimento->getCidade());
            $stmt->bindValue(10, $pontoAtendimento->getEstado());
            $stmt->bindValue(11, $pontoAtendimento->getCep());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }
    }

    public function update(PontoAtendimento $pontoAtendimento){
        try {
            $sql = "UPDATE `SHM_PontosAtend` SET `nomeFantasia` = ?, `razaoSocial` = ?, `endereco` = ?, `complemento` = ?, `bairro` = ?, `cidade` = ?, `estado` = ?, `cep` = ? WHERE `id` = ?";
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$pontoAtendimento->getNomeFantasia());
            $stmt->bindParam(2,$pontoAtendimento->getRazaoSocial());
            $stmt->bindParam(3,$pontoAtendimento->getEndereco());
            $stmt->bindParam(4,$pontoAtendimento->getComplemento());
            $stmt->bindParam(5,$pontoAtendimento->getBairro());
            $stmt->bindParam(6,$pontoAtendimento->getCidade());
            $stmt->bindParam(7,$pontoAtendimento->getEstado());
            $stmt->bindParam(8,$pontoAtendimento->getCep());

            $stmt->bindParam(9,$pontoAtendimento->getId());
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
            $sql = "CALL SP_ativaPonto(?)";
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