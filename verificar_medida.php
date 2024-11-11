<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$medida = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from tallas where nombre='$medida'");

echo json_encode($datos);	

	 ?>	