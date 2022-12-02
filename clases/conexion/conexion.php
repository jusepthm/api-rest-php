<?php
class conexion {

    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;

function __construct(){
    $listadatos = $this->datosConexion();
    foreach($listadatos as $key => $value){
        $this->server = $value['server'];
        $this->user = $value['user'];
        $this->password = $value['password'];
        $this->database = $value['database'];
        $this->port = $value['port'];
    }
    $this->conexion = new mysqli($this->server,$this->user,$this->password,$this->database,$this->port);
    if($this->conexion->connect_errno){
        echo "Conexion fallida";
        die();
    }
}

private function datosConexion(){
    $direccion = dirname(__FILE__);
    $jsondata = file_get_contents($direccion."/"."config");
    return json_decode($jsondata, true);
}

private function convertirUtf8($array){
    array_walk_recursive($array,function(&$item,$key){
        if(!mb_detect_encoding($item,'utf-8',true)){
            $item = utf8_encode($item);
        }
    });
    return $array;
}

public function obtenerDatos($sqlstr){
    $results = $this->conexion->query($sqlstr);
    $resultArray = array();
    foreach ($results as $key) {
        $resultArray[] = $key;
    }
    return $this->convertirUtf8($resultArray);
}

public function nomQuery($sqlsrt){
    $results = $this->conexion->query($sqlsrt);
    return $this->conexion->affected_rows;
}

// insertar

public function nomQueryId($sqlsrt){
    $results = $this->conexion->query($sqlsrt);
    $filas = $this->conexion->affected_rows;
    if($filas >= 1){
        return $this->conexion->insert_id;
    }else{
        return 0;
    }
}

}

?>