<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
    $connection = new Conn();    
    $db = $connection::getConn(); 
    
    if(isset($_GET['check'])){
        $sql = "SELECT COUNT(id) as 'qtd'
            FROM `SHM_Usuario`
            WHERE fl_excluido != 1 AND grupo = " . $_GET['check'] . ";";
        
        $retTokens = $db->prepare($sql);    
        $retTokens->execute();
        $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($linha);
        
        exit;    
    }
    
    $sql = "UPDATE `SHM_UsuarioGrupo`
            SET
            `flExcluido` = 1
            WHERE `id` = " . $_GET['id']. ";";    

    
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();

    echo 'ok';