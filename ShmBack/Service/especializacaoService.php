<?php
require_once("Repository/especializacaoRepository.php");
require_once("jsonService.php");

class EspecializacaoService{

    public static function findAll(){
        $especializacaoRepository = new EspecializacaoRepository();
        $jsonService = new JsonService();
        $especializacaoRepository = $especializacaoRepository::findAll();
        $json = $jsonService::arrayToJson($especializacaoRepository);
        return $json;
    }

    public static function save($json){
        $especializacaoRepository = new EspecializacaoRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $especializacaoRepository::save($objeto);
        return $resp;
    }

    public static function update($json){
        $especializacaoRepository = new EspecializacaoRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Cliente::class);
        $resp = $especializacaoRepository::update($objeto);
        return $resp;
    }
        
}
