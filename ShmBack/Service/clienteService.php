<?php
include "Repository/clienteRepository.php";



class ClienteService{

    //André ['2020-09-17 17:54:43'] Criar service de conversão objeto <-> json
    public function arrayToJSON($array){
        $clienteRepository = new ClienteRepository();
        $array = $clienteRepository::findAll();
        $jsonArray = null;
        for($i=0;$i<sizeof($array);$i++){
            $objeto = $array[$i];
            $json = json_encode($objeto);
            $jsonArray = $jsonArray.$json;
            }
            return $jsonArray;
    }

}
?>