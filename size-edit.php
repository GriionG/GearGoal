
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_talla = $_POST['txtid'];
        $talla = $_POST['txttalla'];
        $medida = $_POST['txtmedidas'];

         $result = $obj->Ejecutar_Instruccion("update tallas set nombre = '$talla', medida = '$medida' WHERE id_talla = '$id_talla'");

         echo '<script>window.location = "size.php"; </script>';

?>