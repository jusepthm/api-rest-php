<?php
require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

class auth extends conexion{
    
    public function login($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['usuario']) || !isset($datos["password"])){
            // error con los campos
            return $_respuestas->error_400();
        }else{
            //bien
            $usuario = $datos['usuario'];
            $password = $datos["password"];
            $password = parent::encriptar($password);
            $datos = $this->obtenerDatosUsuario($usuario);
            if($datos){
                //verificacion de contraseña
                if($password == $datos[0]['Password']){

                }else{
                    //contraseña no es igual
                return $_respuestas->error_200("El password no valido");
                }
                

            }else{
                //si no existe el usuario
                return $_respuestas->error_200("El usuario $usuario no existe");
            }
        }

    }


    private function obtenerDatosUsuario($correo){
        $query = "SELECT UsuarioId,Password,Estado FROM usuarios WHERE usuario = '$correo'";
        $datos = parent::obtenerDatos($query);
        if(isset($datos[0]["UsuarioId"])){
            return $datos;
        }else{
            return 0;
        }
    }

}

?>