<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$liga = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from liga where nombre='$liga'");

echo json_encode($datos);	

	 ?>	