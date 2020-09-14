<?php
include "Conn.php";



class seguranca
{
    
    public static function check($usuario, $token, $seg){
       
        $usuarioTrat = base64_encode(strtolower(base64_decode($usuario)));
        $tokenTrat = base64_encode(base64_decode($token));

        $connection = new Conn();    
        $db = $connection::getConn(); 

        $sql = "SELECT a.id,
                        CASE WHEN a.fl_bloqueado = 1 THEN 'bloqueado' WHEN b.flAtivo <> 1 THEN 'grupoBloqueado' ELSE 'liberado' END as statusLogin,
                        b.Seguranca
                    FROM `SHM_Usuario` a
                    JOIN SHM_UsuarioGrupo b ON a.grupo = b.id
                    WHERE a.fl_excluido <> 1 AND a.token64 = '" . $tokenTrat . "' AND a.email64 = '" .  $usuarioTrat . "'";     

        $retTokens = $db->prepare($sql);    
        $retTokens->execute();
        $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);

        if(count($linha) == 0){
            echo 'LOGIN';
            exit;
        }

        if($linha[0]['statusLogin'] != 'liberado'){
            echo 'LOGIN';
            exit;
        }

    }

}