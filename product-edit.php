<?php
        require 'bd/conexion_bd.php'; 
    //crear objeto 
        $obj = new BD_PDO();

        $idproducto = $_POST['txtid'];
        $producto = $_POST['txtprodu'];
        $precioC = $_POST['txtprecioC'];
        $precioV = $_POST['txtprecioV'];
        $edicion = $_POST['frmedicion'];
        $tipo = $_POST['frmtipo'];
        $stock = $_POST['txtcantidad'];
        @$imagen = $_POST['txtimagen'];
        $status = $_POST['frmstatus'];
        $brands = $_POST['frmmarca'];
        $team = $_POST['frmequipo'];
        $season = $_POST['frmtemporada'];
        $size = $_POST['frmtalla'];
		
		//echo "<script>alert('".basename($_FILES['txtimagen']['name'])."');</script>";
		//echo "<script>alert('".$img."');</script>";

		if (basename($_FILES['txtimagen']['name'])=="") {
			$result = $obj->Ejecutar_Instruccion("update productos set nombre = '$producto',precioC = '$precioC',precioV = '$precioV',edicion = '$edicion',equipacion = '$tipo',cantidad='$stock',estado ='$status',marca_fk='$brands',equipo_fk='$team',temporada_fk='$season',talla_fk='$size' WHERE id_producto = '$idproducto'");	//este else es de la toma de decisiones si la imagen esta vacia

            echo '<script>window.location = "product.php"; </script>';
			} 
			else{
                $dir_subida = 'img/subidas/';
    $nombre_archivo = basename($_FILES['txtimagen']['name']);
    $fichero_subido = $dir_subida . $nombre_archivo;
    
    if (move_uploaded_file($_FILES['txtimagen']['tmp_name'], $fichero_subido)) {
        // Aquí realizas la inserción en la base de datos
        // Guarda $fichero_subido en la base de datos en lugar de $imagen
						
                        $result = $obj->Ejecutar_Instruccion("update productos set nombre = '$producto',precioC = '$precioC',precioV = '$precioV',edicion = '$edicion',equipacion = '$tipo',cantidad = '$stock',img = '$fichero_subido',estado ='$status',marca_fk='$brands',equipo_fk='$team',temporada_fk='$season',talla_fk='$size' WHERE id_producto = '$idproducto'");
                        echo '<script>window.location = "product.php"; </script>';

					} else {
						echo "No se pudo mover el archivo\n";
                        echo '<script>window.location = "product.php"; </script>';

					}

				}

                var_dump($imagen);


?>

