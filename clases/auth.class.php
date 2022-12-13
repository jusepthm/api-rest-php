<?php
require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

class auth extends conexion{
    
    public function login($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['usuario']) || !isset($datos["password"])){
            // error con los campos
        }else{
            //todo bien
        }

    }
}

?>