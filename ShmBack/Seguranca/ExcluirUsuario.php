<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
    $connection = new Conn();    
    $db = $connection::getConn(); 
    
    
    $sql = "UPDATE `SHM_Usuario`
            SET
            `fl_excluido` = 1
            WHERE `id` = " . $_GET['id']. ";";    

    
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();

    echo 'ok';