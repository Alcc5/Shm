<?php
include "Controller/clienteController.php";

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

$base = '/Projeto_Shm/ShmBack/';
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if($uri == $base . "cliente" && $method == "GET") {
    echo ClienteController::findAll();  
}
else if($uri == $base . "cliente" && $method == "POST") {
    echo ClienteController::save(file_get_contents('php://input'));  
}
else if($uri == $base . "cliente" && $method == "PUT") {
    echo ClienteController::update(file_get_contents('php://input'));  
}
else if($uri == $base . "cliente/ativo" && $method == "PUT") {
    echo ClienteController::delete(file_get_contents('php://input'));  
}