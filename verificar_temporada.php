<?php 
session_start();
 
require '../bd/conexion_bd.php';

$obj = new BD_PDO();

$temporada = $_GET['p'];
$datos = $obj->Ejecutar_Instruccion("Select * from temporadas where anos='$temporada'");

echo json_encode($datos);	

	 ?>	