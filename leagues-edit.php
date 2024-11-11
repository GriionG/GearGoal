
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_liga = $_POST['txtid'];
        $liga = $_POST['txtliga'];
        $pais = $_POST['txtpais'];

         $result = $obj->Ejecutar_Instruccion("update liga set nombre = '$liga', pais = '$pais' WHERE id_liga = '$id_liga'");

         echo '<script>window.location = "leagues.php"; </script>';

?>