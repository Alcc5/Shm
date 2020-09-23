<?php
require_once("Service/usuarioService.php");

class UsuarioController{

    public static function findAll(){
        $usuarioService = new UsuarioService();
        $result = $usuarioService->findAll();
        return $result;
    }

    public static function save($json){
        $usuarioService = new UsuarioService();
        return $usuarioService->save($json);
    }

    public static function update($json){
        $usuarioService = new UsuarioService();
        return $usuarioService->update($json);
    }

    public static function delete($json){
        $usuarioService = new UsuarioService();
        return $usuarioService->delete($json);
    }
}
?>