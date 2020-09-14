<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type");


include "../../Conn.php";
if ( ! session_id() ) @ session_start();

if(count($_FILES)>0){
    if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
    {
        $target_path = '../Uploads/';
        
        $iTmp = 1;
        
        $tipo = explode('.' ,$_FILES['uploadFile']['name']);
        $tipo = strtoupper($tipo[count($tipo)-1]);
        
        while (file_exists($target_path  . $iTmp . '.' . $tipo)){
            $iTmp++;
        }
        
        $source_path = $_FILES['uploadFile']['tmp_name'];
        $target_path = $target_path  . $iTmp . '.' . $tipo;
        if(move_uploaded_file($source_path, $target_path))
        {
                       
            echo '<input type="text" style="display:none;" name="idFile" id="idFile" value="1" />';
            echo '<input type="text" style="display:none;" name="tipoFile" id="tipoFile" value="1" />';
            exit;
        }
    }
    
    exit;
}

?>