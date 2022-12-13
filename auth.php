<?php
require_once 'clases/auth.class.php';
require_once 'clases/respuestas.class.php';

$_auth = new auth;
$_respuetas = new respuestas;


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $postBody = file_get_contents("php://input");
    //print_r($postBody);
    $datosArray = $_auth->login($postBody);
    print_r(json_encode($datosArray));

}else{
    echo "Metodo no permitido";
}


?>