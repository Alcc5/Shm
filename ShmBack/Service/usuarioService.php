<?php
require_once("Repository/usuarioRepository.php");
require_once("jsonService.php");

class UsuarioService{

    public static function findAll(){
        $usuarioRepository = new UsuarioRepository();
        $jsonService = new JsonService();
        $usuarioRepository = $usuarioRepository::findAll();
        $json = $jsonService::arrayToJson($usuarioRepository);
        return $json;
    }

    public static function save($json){
        $usuarioRepository = new UsuarioRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Usuario::class);
        $resp = $usuarioRepository::save($objeto);
        return $resp;
    }

    public static function update($json){
        $usuarioRepository = new UsuarioRepository();
        $jsonService = new JsonService();
        $objeto = $jsonService::jsonToObject($json,Usuario::class);
        $resp = $usuarioRepository::update($objeto);
        return $resp;
    }

    public static function delete($json){
        $usuarioRepository = new UsuarioRepository();
        $objeto = json_decode($json);
        $resp = $usuarioRepository::delete($objeto->id);
        return $resp;
    }
        
}
