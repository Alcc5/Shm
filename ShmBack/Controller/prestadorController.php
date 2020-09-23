<?php
require_once("Service/prestadorService.php");

class PrestadorController{

    public static function findAll(){
        $prestadorService = new PrestadorService();
        $result = $prestadorService->findAll();
        return $result;
    }

    public static function save($json){
        $prestadorService = new PrestadorService();
        return $prestadorService->save($json);
    }

    public static function update($json){
        $prestadorService = new PrestadorService();
        return $prestadorService->update($json);
    }

    public static function delete($json){
        $prestadorService = new PrestadorService();
        return $prestadorService->delete($json);
    }
}
?>