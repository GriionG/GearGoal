<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$marca = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from marca where nombre='$marca'");

echo json_encode($datos);	

	 ?>	