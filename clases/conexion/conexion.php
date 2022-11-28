<?php
class conexion {

    private $server;
    private $user;
    private $password;
    private $database;
    private $port;



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