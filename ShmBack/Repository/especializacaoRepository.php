<?php

require_once("CheckLogin.php");
require_once("Model/especializacao.php");

class EspecializacaoRepository {

    public static function findAll(){
        try {
            $sql = "SELECT `*` FROM `SHM_Especializacoes`";
            $connection = new Conn();    
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $result  = array();
            if ($stmt->execute()) {
                while ($rs = $stmt->fetchObject(Especializacao::class)) {
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

    public static function save(Especializacao $especializacao){
        try {
            $sql = "INSERT INTO `SHM_Especializacoes` VALUES (?, ?)";
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, NULL);  
            $stmt->bindValue(2, $especializacao->getEspecializacao());

            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }
    }

    public static function update(Especializacao $especializacao){
        try {
            $sql = "UPDATE `SHM_Especializacoes` SET `especializacao` = ? WHERE `id` = ?";
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$especializacao->getEspecializacao());


            $stmt->bindParam(2,$especializacao->getId());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        finally{
            $db = null;
        }
    }

}
?>