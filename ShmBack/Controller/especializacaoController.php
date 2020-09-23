<?php
require_once("Service/especializacaoService.php");

class EspecializacaoController{

    public static function findAll(){
        $especializacaoService = new EspecializacaoService();
        $result = $especializacaoService->findAll();
        return $result;
    }

    public static function save($json){
        $especializacaoService = new EspecializacaoService();
        return $especializacaoService->save($json);
    }

    public static function update($json){
        $especializacaoService = new EspecializacaoService();
        return $especializacaoService->update($json);
    }

}
?>