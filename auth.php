<?php
require_once 'clases/auth.class.php';
require_once 'clases/respuestas.class.php';

// $_auth = new auth;
$_respuetas = new respuestas;


if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "hola desde el documento";
}else{
    echo "Metodo no permitido";
}


?>