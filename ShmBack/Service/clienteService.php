<?php
require_once("Repository/clienteRepository.php");
require_once("jsonService.php");

class ClienteService{

    public static function findAll(){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $clienteRepository = $clienteRepository::findAll();
        $json = $jsonService::arrayToJson($clienteRepository);
        return $json;
    }

    public static function save($json){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $clienteRepository::save($objeto);
        return $resp;
    }

    public static function update($json){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $clienteRepository::update($objeto);
        return $resp;
    }

    public static function delete($json){
        $clienteRepository = new ClienteRepository();
        $objeto = json_decode($json);
        $resp = $clienteRepository::delete($objeto->id);
        return $resp;
    }
        
}
