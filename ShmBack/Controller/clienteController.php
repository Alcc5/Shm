<?php
require_once("Service/clienteService.php");

class ClienteController{

    public static function findAll(){
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