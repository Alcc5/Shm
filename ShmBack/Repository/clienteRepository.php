<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
if ( ! session_id() ) @ session_start();    

if(isset($_GET['id'])){
    echo $_GET['id'];
}

$data=json_decode(file_get_contents('php://input'), 1);
print_r($data);

$connection = new Conn();    
$db = $connection::getConn(); 

$camposListaClientes = "nomeFantasia, cidade, ativo"
public function findAllClients($camposListaClientes){
    $sql = "SELECT `$campos`
    FROM `shm_dev.SHM_Clientes`";
}

$retTokens = $db->prepare($sql);    
$retTokens->execute();
$linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($linha); */
?>