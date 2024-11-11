<?php 

require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$correo = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from usuarios where email='$correo");

echo json_encode($datos);

?>