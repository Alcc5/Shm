<?php

require_once("CheckLogin.php");
require_once("Model/usuario.php");

class UsuarioRepository {

    public static function findAll(){
        try {
            $sql = "SELECT `*` FROM `SHM_Usuarios`";
            $connection = new Conn();    
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $result  = array();
            if ($stmt->execute()) {
                while ($rs = $stmt->fetchObject(Usuario::class)) {
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

    public static function save(Usuario $usuario){
        try {
            $sql = "INSERT INTO `SHM_Usuarios` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $connection = new Conn();    
            $db = $connection::getConn(); 
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, NULL);  
            $stmt->bindValue(2, 1);
            $stmt->bindValue(3, $usuario->getCpf());
            $stmt->bindValue(4, $usuario->getNome());
            $stmt->bindValue(5, $usuario->getEndereco());
            $stmt->bindValue(6, $usuario->getComplemento());
            $stmt->bindValue(7, $usuario->getBairro());
            $stmt->bindValue(8, $usuario->getCidade());
            $stmt->bindValue(9, $usuario->getEstado());
            $stmt->bindValue(10, $usuario->getEmail());
            $stmt->bindValue(11, $usuario->getCep());
            return $stmt->execute();

        } catch (Exception $e) {
            echo $e->getTraceAsString();

        } finally{
            $db = null;
        }
    }

    public static function update(Usuario $usuario){
        try {
            $sql = "UPDATE `SHM_Usuarios` SET `nomeFantasia` = ?, `razaoSocial` = ?, `endereco` = ?, `complemento` = ?, `bairro` = ?, `cidade` = ?, `estado` = ?, `cep` = ? WHERE `id` = ?";
            $connection = new Conn();
            $db = $connection::getConn();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1,$usuario->getNome());
            $stmt->bindParam(2,$usuario->getEndereco());
            $stmt->bindParam(3,$usuario->getComplemento());
            $stmt->bindParam(4,$usuario->getBairro());
            $stmt->bindParam(5,$usuario->getCidade());
            $stmt->bindParam(6,$usuario->getEstado());
            $stmt->bindParam(7,$usuario->getEmail());
            $stmt->bindParam(8,$usuario->getCep());

            $stmt->bindParam(9,$usuario->getId());
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
            $sql = "CALL SP_ativaUsuario(?)";
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