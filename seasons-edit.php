
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_temporada = $_POST['txtid'];
        $tempo = $_POST['txttemp'];
        $nombre = $_POST['txtnombre'];

         $result = $obj->Ejecutar_Instruccion("update temporadas set anos = '$tempo', nombre = '$nombre' WHERE id_temporada = '$id_temporada'");

         echo '<script>window.location = "seasons.php"; </script>';

?>