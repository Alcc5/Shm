<?php
include "Service/clienteService.php";

class ClienteController{

    public static function findAll(){
        /* $seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
        if ( ! session_id() ) @ session_start(); */
        /* $urlEntrada = explode("/", $_SERVER['REQUEST_URI']);
        print_r($urlEntrada); */
        $clienteService = new ClienteService();
        $result = $clienteService->findAll();
        return $result;
    }

    public static function save($json){
        $clienteService = new ClienteService();
        return $clienteService->save($json);
    }

    public static function update($json){
        $clienteService = new ClienteService();
        return $clienteService->update($json);
    }

    public static function delete($json){
        $clienteService = new ClienteService();
        return $clienteService->delete($json);
    }
}
?>