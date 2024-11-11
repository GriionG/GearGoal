
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_equipo = $_POST['txtid'];
        $equipo = $_POST['txtequipo'];
        $categoria = $_POST['frmcategoria'];
        $liga = $_POST['frmliga'];

         $result = $obj->Ejecutar_Instruccion("update equipos set nombre = '$equipo', categoria = '$categoria', fkliga = '$liga' WHERE id_equipo = '$id_equipo'");

         echo '<script>window.location = "teams.php"; </script>';

?>