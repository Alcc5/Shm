<?php

class JsonService{

    public function arrayToJson($array){
        $jsonArray = null;
        for($i=0;$i<sizeof($array);$i++){
            $objeto = $array[$i];
            $json = json_encode($objeto);
            $jsonArray = $jsonArray.$json;
            }
            return $jsonArray;
    }

    public function jsonToObject($json,$class){
        $data = json_decode($json);
        $class = new $class;
        foreach ($data as $key => $value) {
            //$class->{$key} = $value;
            $setter = self::buildSetter($key);
            $class->$setter($value);
        }
        return $class;
    }

    public function buildSetter($key){
        $setter = "set".ucwords($key);
        return $setter;
    }
}