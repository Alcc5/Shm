<?php
include "Repository/clienteRepository.php";

$clienteRepo = new ClienteRepository();
$cliente = new Cliente();

/*$cliente->setAtivo('1');
$cliente->setCnpj('CNPJ16');
$cliente->setNomeFantasia('Cliente 6');
$cliente->setRazaoSocial('Razao - Cliente 6');
$cliente->setEndereco('Rua 6');
$cliente->setComplemento('comp 6');
$cliente->setBairro('Bairro 6');
$cliente->setCidade('Cidade 6');
$cliente->setEstado('SP');
$cliente->setCep('3454364564');
$resposta = $clienteRepo::save($cliente);
var_dump($resposta); */


$cliente->setId(1);
$cliente->setNomeFantasia('Cliente 500');
$cliente->setRazaoSocial('Razao - Cliente 500');
$cliente->setEndereco('Rua 500');
$cliente->setComplemento('comp 500');
$cliente->setBairro('Bairro 500');
$cliente->setCidade('Cidade 500');
$cliente->setEstado('SP');
$cliente->setCep('987654321');
$resposta = $clienteRepo::update($cliente);
var_dump($resposta);


$rs = $clienteRepo::findAll();
var_dump($rs);
?>