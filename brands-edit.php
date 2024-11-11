
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_marca = $_POST['txtid'];
        $marca = $_POST['txtmarca'];

         $result = $obj->Ejecutar_Instruccion("update marca set nombre = '$marca' WHERE id_marca= '$id_marca'");

         echo '<script>window.location = "brands.php"; </script>';

?>