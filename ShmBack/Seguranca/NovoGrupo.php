<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
if ( ! session_id() ) @ session_start();

$data=json_decode(file_get_contents('php://input'),1);
print_r($data);

if($data["id"] == 0){
    $sql = "INSERT INTO `SHM_UsuarioGrupo`
            (`nome`,
            `Seguranca`,
            `flAtivo`,conta)
            VALUES
            ('" . $data['nome']. "',
            '" . json_encode($data['seguranca']). "',
            " . $data['flAtivo']. ",20);";
}
else{
    $sql = "UPDATE `SHM_UsuarioGrupo`
            SET
            `nome` = '" . $data['nome']. "',
            `Seguranca` = '" . json_encode($data['seguranca']). "',
            `flAtivo` = " . $data['flAtivo']. "
            WHERE `id` = " . $data['id']. ";";    
}


//echo $sql;
//exit;


$connection = new Conn();    
$db = $connection::getConn(); 
    
$retTokens = $db->prepare($sql);    
$retTokens->execute();
