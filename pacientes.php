<?php 
require_once 'clases/respuestas.class.php';
require_once 'clases/pacientes.class.php';

$_respuestas = new respuestas;
$_pacientes = new pacientes;


 if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaPacientes = $_pacientes->listaPacientes($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaPacientes);
        http_response_code(200);
    }else if(isset($_GET['id'])){
      $_pacientesId = $_GET['id'];
      $datosPaciente = $_pacientes->obtenerPaciente($_pacientesId);
      header("Content-Type: application/json");
      echo json_encode($datosPaciente);
      http_response_code(200);
    }
    
 }else if($_SERVER['REQUEST_METHOD'] == "POST"){
      //Recibimos datos enviados
      $postBody = file_get_contents("php://input");
      //Enviamos los datos al manejador
      $resp = $_pacientes->post($postBody);
      print_r($resp);
   
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