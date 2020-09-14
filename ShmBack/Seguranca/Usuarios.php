<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
if ( ! session_id() ) @ session_start();

    $connection = new Conn();    
    $db = $connection::getConn(); 
    
    $sql = "SELECT a.id,
                    a.nome,
                    a.email,
                    b.nome as grupo,
                    a.grupo as idGrupo,
                    CASE WHEN a.fl_bloqueado = 1 THEN 'bloqueado' WHEN b.flAtivo <> 1 THEN 'grupoBloqueado' ELSE 'liberado' END as statusLogin,
                    a.fl_bloqueado
                FROM `SHM_Usuario` a
                JOIN SHM_UsuarioGrupo b ON a.grupo = b.id
                WHERE a.fl_excluido <> 1 ";     
    
    if(isset($_GET['id'])){
        $sql .= 'AND a.id = ' . $_GET['id'] . '';
    }

    if(isset($_GET['nome'])){
        if($_GET['nome'] != ''){
            $sql .= " AND a.nome like '%" . $_GET['nome'] . "%' ";
        }
    }
    
    if(isset($_GET['email'])){
        if($_GET['email'] != ''){
            $sql .= " AND a.email like '%" . $_GET['email'] . "%' ";
        }
    }
    
    if(isset($_GET['grupo'])){
        if($_GET['grupo'] != ''){
            $sql .= " AND a.grupo = " . $_GET['grupo'] . " ";
        }
    }
    
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($linha);