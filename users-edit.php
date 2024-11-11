
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_usuario = $_POST['txtid'];
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $correo = $_POST['txtcorreo'];
        $num = $_POST['txtNumcel'];
        $direccion = $_POST['txtdireccion'];
        $descripcion = $_POST['txtdescripcion'];
        $privilegio = $_POST['frmprivilegio'];

         $result = $obj->Ejecutar_Instruccion("update usuarios set email = '$correo', nombre = '$nombre', apellidos = '$apellido', direccion = '$direccion', telefono = '$num', descripcion = '$descripcion', privilegio = '$privilegio' WHERE id_usuario = '$id_usuario'");

         echo '<script>window.location = "users.php"; </script>';

?>