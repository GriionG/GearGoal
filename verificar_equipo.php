<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$equipo = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from equipos where nombre='$equipo'");

echo json_encode($datos);	

	 ?>	