<?php
//ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);
    
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../Conn.php";
    
if ( ! session_id() ) @ session_start();




if(isset($_GET['usuario'])){
    $usuario = base64_encode(strtolower(base64_decode($_GET['usuario'])));
    $senha = base64_encode(base64_decode($_GET['senha']));

    $sql = "SELECT a.id,
                    a.nome,
                    a.email,
                    b.nome as grupo,
                    a.grupo as idGrupo,
                    CASE WHEN a.fl_bloqueado = 1 THEN 'bloqueado' WHEN b.flAtivo <> 1 THEN 'grupoBloqueado' ELSE 'liberado' END as statusLogin,
                    a.fl_bloqueado,
                    b.flAtivo,
                    b.Seguranca
                FROM `SHM_Usuario` a
                JOIN SHM_UsuarioGrupo b ON a.grupo = b.id
                WHERE a.fl_excluido <> 1 AND a.email64 = '" . $usuario . "' AND a.senha = '" . $senha . "'";     
        
    $connection = new Conn();    
    $db = $connection::getConn(); 
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($linha) > 0){
        
        if($linha[0]['fl_bloqueado'] == 1){
            echo 'BLOQUEADO';
            exit;
        }
        else if($linha[0]['flAtivo'] == 0){
            echo 'BLOQUEADO';
            exit;
        }
        
        $tokenValidacao = "";
        while(strlen($tokenValidacao)<10){
            $tokenValidacao = $tokenValidacao . rand(0,10);
        }
        $tokenValidacao = base64_encode($tokenValidacao);
        
        $_SESSION["LOGIN_ID_SHM"] = $linha[0]['id'];
        $_SESSION["LOGIN_US_SHM"] = $usuario;
        $_SESSION["LOGIN_PW_SHM"] = $senha;
        $_SESSION["LOGIN_TK_SHM"] = $tokenValidacao;
        
        $sql = "SELECT 1; UPDATE `SHM_Usuario` SET token64 = '" . $tokenValidacao . "' WHERE `id` = " . $linha[0]['id'] . ";";
        $connection = new Conn();
        $db = $connection::getConn();        
        $retTokens = $db->prepare($sql);
        $retTokens->execute();
        
        echo 'TOKEN|' . $tokenValidacao . '|' . $linha[0]['nome'];
        exit;
    }      
    else {
        echo 'INVALIDO';
        exit;
    }
}

$usuario = base64_encode(strtolower(base64_decode($_GET['tokenUsuario'])));
$token = base64_encode(base64_decode($_GET['token']));

 $connection = new Conn();    
    $db = $connection::getConn(); 
    
    $sql = "SELECT a.id,
                    a.nome,
                    a.email,
                    b.nome as grupo,
                    a.grupo as idGrupo,
                    CASE WHEN a.fl_bloqueado = 1 THEN 'bloqueado' WHEN b.flAtivo <> 1 THEN 'grupoBloqueado' ELSE 'liberado' END as statusLogin,
                    a.fl_bloqueado,
                    b.flAtivo,
                    b.Seguranca
                FROM `SHM_Usuario` a
                JOIN SHM_UsuarioGrupo b ON a.grupo = b.id
                WHERE a.fl_excluido <> 1 AND a.token64 = '" . $token . "' AND a.email64 = '" .  $usuario . "'";     
    
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($linha) == 0){
        echo 'LOGIN';
        ///echo $sql;
        exit;
    }
    
    echo json_encode($linha);