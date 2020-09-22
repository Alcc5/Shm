<?php
include "Service/clienteService.php";
/* include "Repository/clienteRepository.php"; */

$clienteService = new ClienteService();
/* $clienteRepo = new ClienteRepository(); */
$cliente = new Cliente();


//REPOSITORY INSERIR CLIENTE
/* $cliente->setCnpj('CNPJ20');
$cliente->setNomeFantasia('Cliente 20');
$cliente->setRazaoSocial('Razao - Cliente 20');
$cliente->setEndereco('Rua 20');
$cliente->setComplemento('comp 20');
$cliente->setBairro('Bairro 20');
$cliente->setCidade('Cidade 20');
$cliente->setEstado('SP');
$cliente->setCep('3498573498');
$resposta = $clienteRepo::save($cliente);
var_dump($resposta); */

//REPOSITORY ATUALIZAR CLIENTE
/* $cliente->setId(1);
$cliente->setNomeFantasia('Cliente 500');
$cliente->setRazaoSocial('Razao - Cliente 500');
$cliente->setEndereco('Rua 500');
$cliente->setComplemento('comp 500');
$cliente->setBairro('Bairro 500');
$cliente->setCidade('Cidade 500');
$cliente->setEstado('SP');
$cliente->setCep('987654321');
$resposta = $clienteRepo::update($cliente);
var_dump($resposta); */

//REPOSITORY DELEÇÃO LÓGICA CLIENTE
/* $x = $clienteRepo::shift(17);
print_r($x); */

//SERVICE LISTAR CLIENTE
/* $rs = $clienteService::findAll();
print_r($rs); */

//SERVICE INSERIR CLIENTE
/* $json = '{"cnpj":"CNPJ8002","nomeFantasia":"Cliente 8002","razaoSocial":"Razao - Cliente 8002","endereco":"Rua 8002","complemento":"comp 8002","bairro":"Bairro 8002","cidade":"Cidade 8002","estado":"SP","cep":"80028002"}';
$x = $clienteService::save($json);
print_r($x); */

//SERVICE ATUALIZAR CLIENTE
/* $json = '{"id":"17","nomeFantasia":"Cliente 9000","razaoSocial":"Razao - Cliente 9000","endereco":"Rua 9000","complemento":"comp 9000","bairro":"Bairro 9000","cidade":"Cidade 9000","estado":"TO","cep":"90009000"}';
$x = $clienteService::update($json);
print_r($x); */

//SERVICE DELETAR CLIENTE
/* $json = '{"id":"17"}';
$x = $clienteService::delete($json);
print_r($x); */


?>