<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');

if ($dirh) {
    while (($dirElement = readdir($dirh)) !== false) {
        
    }
    closedir($dirh);
}
if ( ! session_id() ) @ session_start();



    $connection = new Conn();    
    $db = $connection::getConn(); 
    
    $sql = "SELECT `id`,
                `nome`,
                `Seguranca`,
                Seguranca as segurancaStr,
                `flDev`,
                `flAtivo`
            FROM `SHM_UsuarioGrupo` WHERE (flExcluido <> 1 OR flExcluido IS NULL) ";     
    
    if(isset($_GET['id'])){
        $sql .= 'AND id = ' . $_GET['id'] . '';
    }

    if(isset($_GET['nome'])){
        if($_GET['nome'] != ''){
            $sql .= " AND nome like '%" . $_GET['nome'] . "%' ";
        }
    }
    
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($linha);