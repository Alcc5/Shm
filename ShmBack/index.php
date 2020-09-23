<?php
require_once("Controller/clienteController.php");
require_once("Controller/pontoAtendimentoController.php");
require_once("Controller/especializacaoController.php");

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

else if($uri == $base . "ponto" && $method == "GET") {
    echo PontoAtendimentoController::findAll();  
}
else if($uri == $base . "ponto" && $method == "POST") {
    echo PontoAtendimentoController::save(file_get_contents('php://input'));  
}
else if($uri == $base . "ponto" && $method == "PUT") {
    echo PontoAtendimentoController::update(file_get_contents('php://input'));  
}
else if($uri == $base . "ponto/ativo" && $method == "PUT") {
    echo PontoAtendimentoController::delete(file_get_contents('php://input'));  
}

else if($uri == $base . "especializacao" && $method == "GET") {
    echo EspecializacaoController::findAll();  
}
else if($uri == $base . "especializacao" && $method == "POST") {
    echo EspecializacaoController::save(file_get_contents('php://input'));  
}
else if($uri == $base . "especializacao" && $method == "PUT") {
    echo EspecializacaoController::update(file_get_contents('php://input'));  
}