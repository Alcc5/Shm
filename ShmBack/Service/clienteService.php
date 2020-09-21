<?php
include "Repository/clienteRepository.php";
include "jsonService.php";

class ClienteService{

    public function findAll(){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $clienteRepository = $clienteRepository::findAll();
        $json = $jsonService::arrayToJson($clienteRepository);
        return $json;
    }

    public function save($json){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $clienteRepository::save($objeto);
        return $resp;
    }

    public function update($json){
        $clienteRepository = new ClienteRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $clienteRepository::update($objeto);
        return $resp;
    }

    public function delete($json){
        $clienteRepository = new ClienteRepository();
        $objeto = json_decode($json);
        $resp = $clienteRepository::delete($objeto->id);
        return $resp;
    }
        
}
