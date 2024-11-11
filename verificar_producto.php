<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$producto = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from productos where nombre='$producto'");

echo json_encode($datos);	

	 ?>	