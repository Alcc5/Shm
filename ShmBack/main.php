<?php
include "Repository/clienteRepository.php";

$clienteRepo = new ClienteRepository();
$cliente = new Cliente('1','CNPJ5','Cliente 5', 'Razao - Cliente 5',  'Rua 5', 'comp 5', 'Bairro 5', 'Cidade 5', 'SP','25251234');

$resposta = $clienteRepo::save($cliente);

echo $resposta;
?>