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
    foreach($listadatos as $key => $vaule){
        $this->server = $value['server'];
        $this->user = $value['user'];
        $this->password = $value['password'];
        $this->database = $value['database'];
        $this->port = $value['port'];
    }
    $this->conexion = new mysql($this->server,$this->user,$this->password,$this->database,$this->port);
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

/* "server":"localhost",
"user":"root",
"password":"",
"database":"apirest",
"port":"3306" */  
}

?>