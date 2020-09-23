<?php
require_once("Repository/prestadorRepository.php");
require_once("jsonService.php");

class PrestadorService{

    public static function findAll(){
        $prestadorRepository = new PrestadorRepository();
        $jsonService = new JsonService();
        $prestadorRepository = $prestadorRepository::findAll();
        $json = $jsonService::arrayToJson($prestadorRepository);
        return $json;
    }

    public static function save($json){
        $prestadorRepository = new PrestadorRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,prestador::class);
        $resp = $prestadorRepository::save($objeto);
        return $resp;
    }

    public static function update($json){
        $prestadorRepository = new PrestadorRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,prestador::class);
        $resp = $prestadorRepository::update($objeto);
        return $resp;
    }

    public static function delete($json){
        $prestadorRepository = new PrestadorRepository();
        $objeto = json_decode($json);
        $resp = $prestadorRepository::delete($objeto->id);
        return $resp;
    }
        
}
