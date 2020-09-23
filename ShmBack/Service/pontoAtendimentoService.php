<?php
require_once("Repository/pontoAtendimentoRepository.php");
require_once("jsonService.php");

class PontoAtendimentoService{

    public function findAll(){
        $pontoAtendimentoRepository = new PontoAtendimentoRepository();
        $jsonService = new JsonService();
        $pontoAtendimentoRepository = $pontoAtendimentoRepository::findAll();
        $json = $jsonService::arrayToJson($pontoAtendimentoRepository);
        return $json;
    }

    public function save($json){
        $pontoAtendimentoRepository = new PontoAtendimentoRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,PontoAtendimento::class);
        $resp = $pontoAtendimentoRepository::save($objeto);
        return $resp;
    }

    public function update($json){
        $pontoAtendimentoRepository = new PontoAtendimentoRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,PontoAtendimento::class);
        $resp = $pontoAtendimentoRepository::update($objeto);
        return $resp;
    }

    public function delete($json){
        $pontoAtendimentoRepository = new PontoAtendimentoRepository();
        $objeto = json_decode($json);
        $resp = $pontoAtendimentoRepository::delete($objeto->id);
        return $resp;
    }
        
}
