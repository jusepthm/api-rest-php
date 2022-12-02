<?php
require_once"clases/conexion/conexion.php";

$conexion = new conexion;

$query = "INSERT INTO pacientes (DNI)VALUE('0')";

/* print_r($conexion->nomQuery($query)); */

print_r($conexion->nomQueryId($query));

?>