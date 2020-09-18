<?php
include "Service/clienteService.php";
/* include "Repository/clienteRepository.php"; */

$clienteService = new ClienteService();
/* $clienteRepo = new ClienteRepository(); */
$cliente = new Cliente();


//inserir
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

//atualizar
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

//coverter para JSON e selecionar
/* $jsonArray = null;
$rs = $clienteRepo::findAll();
for($i=0;$i<sizeof($rs);$i++){
    $objeto = $rs[$i];
    $json = json_encode($objeto);
    $jsonArray = $jsonArray.$json;
    }
    print_r($jsonArray); */

//deleção lógica
/* $x = $clienteRepo::shift(17);
print_r($x); */

//ClienteService listar
/* $rs = $clienteService::findAll();
print_r($rs); */

//ClienteService inserir
$json = '{"cnpj":"CNPJ8001","nomeFantasia":"Cliente 8001","razaoSocial":"Razao - Cliente 8001","endereco":"Rua 8001","complemento":"comp 8001","bairro":"Bairro 8001","cidade":"Cidade 8001","estado":"SP","cep":"80018001"}';
$x = $clienteService::save($json);
print_r($x);

?>