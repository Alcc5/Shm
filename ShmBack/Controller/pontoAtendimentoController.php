<?php
require_once("Service/pontoAtendimentoService.php");

class PontoAtendimentoController{

    public static function findAll(){
        $pontoAtendimentoService = new PontoAtendimentoService();
        $result = $pontoAtendimentoService->findAll();
        return $result;
    }

    public static function save($json){
        $pontoAtendimentoService = new PontoAtendimentoService();
        return $pontoAtendimentoService->save($json);
    }

    public static function update($json){
        $pontoAtendimentoService = new PontoAtendimentoService();
        return $pontoAtendimentoService->update($json);
    }

    public static function delete($json){
        $pontoAtendimentoService = new PontoAtendimentoService();
        return $pontoAtendimentoService->delete($json);
    }
}
?>