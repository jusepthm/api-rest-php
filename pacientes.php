<?php 
require_once 'clases/respuestas.class.php';
require_once 'clases/pacientes.class.php';

$_respuestas = new respuestas;
$_pacientes = new pacientes;


 if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaPacientes = $_pacientes->listaPacientes($pagina);
        echo json_encode($listaPacientes);
    }
    
 }else if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "Hola POST";
 }else if($_SERVER['REQUEST_METHOD'] == "PUT"){
    echo "Hola PUT";
 }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    echo "Hola DELETE";
 }else{
    header('Content-Type: application/json');
    $datosArray = $_respuetas->error_405();
    echo json_encode($datosArray);
 }


?>