
<?php 

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    // Usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: login.php");
    exit;
}

// Acceder a la variable de sesión 'discapacidad'
if(isset($_SESSION['discapacidad'])) {
    @$discapacidad = $_SESSION['discapacidad'];
    // Aquí puedes utilizar la variable $discapacidad según sea necesario en tu página index.php
    // Por ejemplo, puedes cambiar el estilo de la página según la discapacidad del usuario
    // if($discapacidad == 'daltonismo') {
    //     // Cambiar el estilo para usuarios con daltonismo
    //     echo '<link href="css/style-daltonismo.css" rel="stylesheet">';
    // }
}

if ($_SESSION['privilegio']=='Admin') {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GoalGear</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/icono.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f7f523ca7f.js" crossorigin="anonymous"></script>
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


      
     <!-- Template Stylesheet -->
     <?php
 // Verificar si el usuario tiene la discapacidad de daltonismo
 if(@$discapacidad == 'Daltonico') {
    // Cambiar el enlace al archivo CSS si el usuario tiene daltonismo
    echo '<link href="css/style-daltonico.css" rel="stylesheet">';
}elseif(@$discapacidad == 'Miope'){
    echo '<link href="css/style-miope.css" rel="stylesheet">';
}elseif(@$discapacidad == 'Ciego'){
    echo '<link href="css/style1.css" rel="stylesheet">';
}elseif(@$discapacidad == 'Ninguna'){
    echo '<link href="css/style1.css" rel="stylesheet">';
}else{
    echo '<link href="css/style1.css" rel="stylesheet">';
}
// Agrega más condiciones según sea necesario para otros tipos de discapacidad
?>
        <script>
             function validar()
    {
        var produ = document.getElementById("txtprodu").value;
        var precioC = document.getElementById("txtprecioC").value;
        var precioV = document.getElementById("txtprecioV").value;
        var eidi = document.getElementById("frmedicion").value;
        var tipo = document.getElementById("frmtipo").value;
        var cant = document.getElementById("txtcantidad").value;
        var statu = document.getElementById("frmstatus").value;
        var equi = document.getElementById("frmequipo").value;
        var marca = document.getElementById("frmmarca").value;
        var tem = document.getElementById("frmtemporada").value;
        var size = document.getElementById("frmtalla").value;

        if (produ.trim().length<1) 
        {
            alert("El campo de nombre de producto esta vacio");
            return false;
        }

        if (precioC.trim().length<1) 
        {
            alert("El campo de precio compra esta vacio");
            return false;
        }

        if (precioV.trim().length<1) 
        {
            alert("El campo de precio venta esta vacio");
            return false;
        }
        if (eidi.trim().length<1) 
        {
            alert("El campo de edicion esta vacio");
            return false;
        }

        if (tipo.trim().length<1) 
        {
            alert("El campo de tipo de equipacion esta vacio");
            return false;
        }

        if (cant.trim().length<1) 
        {
            alert("El campo de stock esta vacio");
            return false;
        }

        if (statu.trim().length<1) 
        {
            alert("El campo de status esta vacio");
            return false;
        }

        if (equi.trim().length<1) 
        {
            alert("El campo de equipo esta vacio");
            return false;
        }

        if (marca.trim().length<1) 
        {
            alert("El campo de marca esta vacio");
            return false;
        }
        if (tem.trim().length<1) 
        {
            alert("El campo de temporada esta vacio");
            return false;
        }

        if (size.trim().length<1) 
        {
            alert("El campo de medida esta vacio");
            return false;
        }
        
}

function verificar_producto(id)
	{
	  $.getJSON("Validaciones/verificar_producto.php?p=" + id).done(function(datos)  
	    {
	      if (datos[0][0]>0) 
	      {
	        alert("Este producto con ese nombre ya existente");
	        window.location="product.php";
	      }        
	    });  
    
    }

function compmay(){
			var pcom = document.getElementById("txtprecioC").value;
			var pvent = document.getElementById('txtprecioV').value;

			if ( pvent != "") {

			if ( pvent >  pcom) {
				return true;
			}else if(pcom > pvent){
				alert("El precio de compra es mayor que el precio de la venta");
				return false;
			}

		  }

		}

        function ventamen(){
			var pcom = document.getElementById("txtprecioC").value;
			var pvent = document.getElementById('txtprecioV').value;


			//alert("El precio de compra es "+pcom +" "+ "El precio de venta es "+pvent);
			
			if ( pvent >  pcom) {
				return true;
			}
			else if (pcom > pvent) {
				alert("El precio de venta no puede ser menor a el precio de la compra");
				return false;
			} 

		}

        function fileValidation(){
		    var fileInput = document.getElementById('txtimagen');
		    var filePath = fileInput.value;
		    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
		    if(!allowedExtensions.exec(filePath)){
		        alert('Porfavor seleccione un archivo que tenga las extensiones .jpeg/.jpg/.png/ solamente.');
		        fileInput.value = '';
		        return false;
		    }else{
		        //Image preview
		        if (fileInput.files && fileInput.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		            document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[0]);
		        }
		    }
		}

				function fileValidationmod(){
		    var fileInput = document.getElementById('img');
		    var filePath = fileInput.value;
		    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
		    if(!allowedExtensions.exec(filePath)){
		        alert('Porfavor seleccione un archivo que tenga las extensiones .jpeg/.jpg/.png/ solamente.');
		        fileInput.value = '';
		        return false;
		    }else{
		        //Image preview
		        if (fileInput.files && fileInput.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		            document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[0]);
		        }
		    }
		}

        function compmaymod(){
			var pcom = document.getElementById("preC").value;
			var pvent = document.getElementById('preV').value;

			if ( pvent != "") {

			if ( pvent >  pcom) {
				return true;
			}else if(pcom > pvent){
				alert("El precio de compra es mayor que el precio de la venta");
				return false;
			}

		  }

		}

		function ventamenmod(){
			var pcom = document.getElementById("preC").value;
			var pvent = document.getElementById('preV').value;


			//alert("El precio de compra es "+pcom +" "+ "El precio de venta es "+pvent);
			
			if ( pvent >  pcom) {
				return true;
			}
			else if (pcom > pvent) {
				alert("El precio de venta no puede ser menor a el precio de la compra");
				return false;
			} 

		}	

        function validarmodal()
    {
        var produ = document.getElementById("prdu").value;
        var precioC = document.getElementById("preC").value;
        var precioV = document.getElementById("preV").value;
        var eidi = document.getElementById("edic").value;
        var tipo = document.getElementById("tip").value;
        var cant = document.getElementById("cant").value;
        var statu = document.getElementById("sta").value;
        var equi = document.getElementById("ekipo").value;
        var marca = document.getElementById("marc").value;
        var tem = document.getElementById("tem").value;
        var size = document.getElementById("tal").value;

        if (produ.trim().length<1) 
        {
            alert("El campo de nombre de producto esta vacio");
            return false;
        }

        if (precioC.trim().length<1) 
        {
            alert("El campo de precio compra esta vacio");
            return false;
        }

        if (precioV.trim().length<1) 
        {
            alert("El campo de precio venta esta vacio");
            return false;
        }
        if (eidi.trim().length<1) 
        {
            alert("El campo de edicion esta vacio");
            return false;
        }

        if (tipo.trim().length<1) 
        {
            alert("El campo de tipo de equipacion esta vacio");
            return false;
        }

        if (cant.trim().length<1) 
        {
            alert("El campo de stock esta vacio");
            return false;
        }

        if (statu.trim().length<1) 
        {
            alert("El campo de status esta vacio");
            return false;
        }

        if (equi.trim().length<1) 
        {
            alert("El campo de equipo esta vacio");
            return false;
        }

        if (marca.trim().length<1) 
        {
            alert("El campo de marca esta vacio");
            return false;
        }
        if (tem.trim().length<1) 
        {
            alert("El campo de temporada esta vacio");
            return false;
        }

        if (size.trim().length<1) 
        {
            alert("El campo de medida esta vacio");
            return false;
        }
        
}
		
        function eliminar(id){
         if (confirm("¿Estas seguro de eliminar el registro?")) {

            window.location = "product.php?id_eliminar=" + id;

         }
      }

      function modificar(id){
         window.location = "product.php?idmodificar=" + id;
      }

		function cerrar_sesion()
		{
			if (confirm("¿Estas seguro de cerrar la sesion")) {
				window.location = "cerrar_sesion.php"
			}
		}
	</script>
    </head>

<?php 

require 'bd/conexion_bd.php';

$obj = new BD_PDO();

$marca = $obj->Ejecutar_Instruccion("SELECT * FROM marca");
$equipo = $obj->Ejecutar_Instruccion("SELECT * FROM equipos");
$temporadas = $obj->Ejecutar_Instruccion("SELECT * FROM temporadas");
$talla = $obj->Ejecutar_Instruccion("SELECT * FROM tallas");


 if (isset($_POST['btninsertar'])) {

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

    $dir_subida = 'img/subidas/';
    $nombre_archivo = basename($_FILES['txtimagen']['name']);
    $fichero_subido = $dir_subida . $nombre_archivo;
    
    if (move_uploaded_file($_FILES['txtimagen']['tmp_name'], $fichero_subido)) {
        // Aquí realizas la inserción en la base de datos
        // Guarda $fichero_subido en la base de datos en lugar de $imagen
        $result = $obj->Ejecutar_Instruccion("INSERT INTO productos(nombre, precioC, precioV, edicion, equipacion, cantidad, img, estado, marca_fk, equipo_fk, temporada_fk, talla_fk) VALUES ('$producto', '$precioC', '$precioV', '$edicion', '$tipo', '$stock', '$fichero_subido', '$status', '$brands', '$team', '$season', '$size')");
        // Resto de tu código...
        echo '<script>window.location = "product.php"; </script>';
    }
    else {
       echo "No se pudo mover el archivo\n";
    }
} 
else if (isset($_GET['id_eliminar']))
        {
            $id = $_GET['id_eliminar'];
             $obj->Ejecutar_Instruccion("delete from productos where id_producto = '$id'");
        }


if (isset($_POST['btnbuscar'])){
    @$buscar = $_POST['txtbuscar'];
    $result = @$obj->Ejecutar_Instruccion("select * from productos WHERE nombre LIKE '%$buscar%' or equipo_fk LIKE '%$buscar%' ");
    }
    else{
    $result = $obj->Ejecutar_Instruccion("SELECT productos.id_producto,productos.nombre,productos.precioC,productos.precioV,productos.edicion,productos.equipacion,productos.cantidad,productos.img,productos.estado,productos.marca_fk,marca.nombre,productos.equipo_fk,equipos.nombre,productos.temporada_fk,temporadas.anos,productos.talla_fk,tallas.nombre
    FROM productos
    INNER JOIN marca ON productos.marca_fk = marca.id_marca
    INNER JOIN equipos on productos.equipo_fk = equipos.id_equipo
    INNER JOIN temporadas ON productos.temporada_fk = temporadas.id_temporada
    INNER JOIN tallas on productos.talla_fk = tallas.id_talla");
    }

    @$datos =  $obj->Ejecutar_Instruccion("Select * from usuarios where id_usuario = '".@$_SESSION['id_usuario']."'" );
    @$user = $datos[0][3];

?>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        Goalgear@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +52-878-137-0387
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                         <div class="navbar-nav mr-auto">
                         <a href="teams.php" class="nav-item nav-link">Equipos</a>
                         <a href="leagues.php" class="nav-item nav-link ">Ligas</a>
                            <a href="product.php" class="nav-item nav-link active">Productos</a>
                            <a href="brands.php" class="nav-item nav-link">Marcas</a>
                            <a href="size.php" class="nav-item nav-link">Tallas</a>
                            <a href="seasons.php" class="nav-item nav-link">Temporadas</a>
                                <?php
                                 if (@$_SESSION['privilegio']=='Usuario' | @$_SESSION['privilegio']=='Admin') {
                                 ?>
                               <a href="users.php" class="nav-item nav-link">Usuarios</a>
                                <?php } 
                                else 	{
                                ?>
                                    <a href="register.php" class="nav-item nav-link">Registrarse</a>
                                    <?php } ?>
                            </div>
                        </div>
                                <?php
                                 if (@$_SESSION['privilegio']=='Usuario' | @$_SESSION['privilegio']=='Admin') {
                                 ?>
                                <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="padding-right:60px;"><?php echo @$user?></a>
                                <div class="dropdown-menu">
                                    <a href="porfile.php" class="dropdown-item">Perfil</a>
                                    <?php
                                 if ($_SESSION['privilegio']=='Admin') {
                                 ?>
                                 <a href="brands.php" class="dropdown-item">Admin</a> 
                                 <?php } ?>
                                    <a href="cerrar_sesion.php" class="dropdown-item">Cerrar sesion</a>
                                </div>
                            </div>
                                 <?php } 
                                else 	{
                                ?>

                            <a href="login.php" class="nav-item nav-link"  style="padding-right:80px;">Iniciar sesion</a>
                            <?php } ?>                    
							</ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img style="max-width: 60%; height: 100px; width: 60%;" src="img/Logo-goal.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                        <form action="product-list.php" method="post">
                                                <input type="text"  class="form-control" name="txtbuscar" id="txtbuscar" placeholder="Buscar">
                                                <button type="submit" name="btnbuscar" id="btnbuscar" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->  
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h1 class="text-uppercase">Productos</h1>
                    </div>
                </div>
            </div>
                                </div>
        
        <!-- Login Start -->
        <div class="login" style="padding-left: 415px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7">    
                        <div class="register-form">
                        <h3 class="mb-30">Formulario</h3>
                            <div class="row">
                            <form action="product.php" method="post" enctype="multipart/form-data"  onsubmit="return validar()">
                                <div class="col-md-10">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="txtprodu" id="txtprodu" placeholder="Nombre" onblur="javascript: verificar_producto(this.value);"  style="width: 392px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Precio Compra</label>
                                    <input class="form-control" type="number" name="txtprecioC" id="txtprecioC" placeholder="Precio de Compra"  pattern="[0-9.]+" maxlength="10" onblur="compmay();" style="width: 392px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Precio Venta</label>
                                    <input class="form-control" type="number" name="txtprecioV" id="txtprecioV" placeholder="Precio de Venta"  maxlength="10" onblur="ventamen();" pattern="[0-9.]+" style="width: 392px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Edicion</label>
                                    <select  name="frmedicion" id="frmedicion" class="form-control" style="width: 392px;">
									    <option disabled selected value="" >Seleccione Edicion</option>
									    <option value = "Fan">Edicion Fan</option>
            	                        <option value = "Jugador">Edicion Jugador</option>
                                        <option value = "Especial">Edicion Especial</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                    <label>Tipo de Equipacion</label>
                                    <select  name="frmtipo" id="frmtipo" class="form-control" style="width: 392px;">
									    <option disabled selected value="" >Seleccione Tipo de Equipacion</option>
									    <option value = "Primera">Primera Equipacion</option>
            	                        <option value = "Segunda">Segunda Equipacion</option>
                                        <option value = "Tercera">Tercera Equipacion</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                    <label>Stock</label>
                                    <input class="form-control" type="number" name="txtcantidad" id="txtcantidad" placeholder="Stock" style="width: 392px;">
                                </div>
                                <div class="col-md-10">
								<label>Imagen</label>
								<input class="" type="file" accept="image/png,image/jpeg" id="txtimagen" name="txtimagen" onchange="return fileValidation()"/>
							</div>
                                <div class="col-md-10">
                                <label>Status</label>
                                    <select  name="frmstatus" id="frmstatus" class="form-control" style="width: 392px;">
									    <option disabled selected value="" >Seleccione Status</option>
									    <option value = "Activo">Activo</option>
            	                        <option value = "Desactivo">Desactivo</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                <label>Equipo</label>
                                <select id="frmequipo" name="frmequipo" class="form-control" style="width: 392px;">
									<option value="">Seleccione Equipo</option>
										<?php foreach ($equipo as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Marca</label>
                                <select id="frmmarca" name="frmmarca" class="form-control" style="width: 392px;">
									<option value="">Marca del Producto</option>
										<?php foreach ($marca as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Temporada</label>
                                <select id="frmtemporada" name="frmtemporada" class="form-control" style="width: 392px;">
									<option value="">Seleccione Temporada</option>
										<?php foreach ($temporadas as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Talla</label>
                                <select id="frmtalla" name="frmtalla" class="form-control" style="width: 392px;">
									<option value="">Seleccione Talla</option>
										<?php foreach ($talla as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-12" sstyle="padding-left:250px;">
                                <input type="submit" name="btninsertar" id="btninsertar" class="btn" value="Insertar" >
                                </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-light table-hover" id="myTable">
                  <thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
            <td>Precio C</td>
			<td>Precio V </td>
            <td>Edicion</td>
            <td>Equipacion</td>
			<td>Stock </td>
            <td>Img</td>
            <td>Status</td>
            <td class="hidden">ID Marca</td>
            <td>Marca</td>
            <td class="hidden">ID Equipo</td>
            <td>Equipo</td>
            <td class="hidden">ID Temporada</td>
            <td>Temporada</td>
            <td class="hidden">ID Talla</td>
            <td>Talla</td>
			<td>Accion </td>

			
			
		</tr>
        </thead>
                  <tbody>
		<?php foreach (@$result as $renglon) { ?>
		<tr>
			<td><?php echo $renglon[0]; ?></td>
			<td><?php echo $renglon[1]; ?></td>
            <td><?php echo $renglon[2]; ?></td>
            <td><?php echo $renglon[3]; ?></td>
			<td><?php echo $renglon[4]; ?></td>
            <td><?php echo $renglon[5]; ?></td>
            <td><?php echo $renglon[6]; ?></td>
			<td><img height="200px" width="200px" src="<?php echo $renglon[7];?>"><br><p class="hidden"></td>
            <td><?php echo $renglon[8];?></td>
            <td class="hidden"><?php echo $renglon[9];?></td>
			<td><?php echo $renglon[10];?></td>
            <td class="hidden"><?php echo $renglon[11]; ?></td>
            <td><?php echo $renglon[12]; ?></td>
            <td class="hidden"><?php echo $renglon[13];?></td>
			<td><?php echo $renglon[14];?></td>
            <td class="hidden"><?php echo $renglon[15]; ?></td>
            <td><?php echo $renglon[16]; ?></td>
				<?php 
	 ?>

			<td style="text-align: center; "><a type="button" class="btn" id="btneliminar" name="btneliminar" value="Eliminar" onclick="javascript:eliminar('<?php echo $renglon[0];?>');" ><i class="fa-solid fa-delete-left"></i></a> 
            <a type="button" class="btn btn-danger editbtn " data-toggle="modal"data-target="#editar"><i class="fa-solid fa-pencil"></i></a> </td>
	

		</tr>
		<?php } ?>
        </tbody>
	   </table>
        </div>
        </div>
        <!-- Login End -->
        <br><br>

        <!-- Modal -->
        <!-- Modal Rechazar -->
		  <div class="modal fade" id="editar" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                     <!--formulario-->
                     <form action="product-edit.php" method="POST" enctype="multipart/form-data"  onsubmit="return validarmodal()">
                                     <div class="form-group">
                                     <div class="col-md-10">
                                     <input type="hidden" id="ide" name="txtid"  class="form-control" placeholder="ID">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="txtprodu" id="prdu" placeholder="Nombre"  onblur="javascript: verificar_producto(this.value);"style="width: 435px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Precio Compra</label>
                                    <input class="form-control" type="number" name="txtprecioC" id="preC" placeholder="Precio de Compra"  pattern="[0-9.]+" maxlength="10" onblur="compmaymod();" style="width: 435px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Precio Venta</label>
                                    <input class="form-control" type="number" name="txtprecioV" id="preV" placeholder="Precio de Venta" maxlength="10" onblur="ventamenmod();" pattern="[0-9.]+" style="width: 435px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Edicion</label>
                                    <select  name="frmedicion" id="edic" class="form-control" style="width: 435px;">
									    <option disabled selected value="" >Seleccione Edicion</option>
									    <option value = "Fan">Edicion Fan</option>
            	                        <option value = "Jugador">Edicion Jugador</option>
                                        <option value = "Especial">Edicion Especial</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                    <label>Tipo de Equipacion</label>
                                    <select  name="frmtipo" id="tip" class="form-control" style="width: 435px;">
									    <option disabled selected value="" >Seleccione Tipo de Equipacion</option>
									    <option value = "Primera">Primera Equipacion</option>
            	                        <option value = "Segunda">Segunda Equipacion</option>
                                        <option value = "Tercera">Tercera Equipacion</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                    <label>Stock</label>
                                    <input class="form-control" type="number" name="txtcantidad" id="cant" placeholder="Stock" style="width: 435px;">
                                </div>
                                <div class="col-md-10">
								<label>Imagen</label>
								<input class="" type="file" accept="image/png,image/jpeg" id="img" name="txtimagen" onchange="return fileValidationmod()"/>
							</div>
                                <div class="col-md-10">
                                <label>Status</label>
                                    <select  name="frmstatus" id="sta" class="form-control" style="width: 435px;">
									    <option disabled selected value="" >Seleccione Status</option>
									    <option value = "Activo">Activo</option>
            	                        <option value = "Desactivo">Desactivo</option>
            	                </select>
                                </div>
                                <div class="col-md-10">
                                <label>Equipo</label>
                                <select id="ekipo" name="frmequipo" class="form-control" style="width: 435px;">
									<option value="">Seleccione Equipo</option>
										<?php foreach ($equipo as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Marca</label>
                                <select id="marc" name="frmmarca" class="form-control" style="width: 435px;">
									<option value="">Marca Patrocinadora</option>
										<?php foreach ($marca as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Temporada</label>
                                <select id="tem" name="frmtemporada" class="form-control" style="width: 435px;">
									<option value="">Seleccione Temporada</option>
										<?php foreach ($temporadas as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                <div class="col-md-10">
                                <label>Talla</label>
                                <select id="tal" name="frmtalla" class="form-control" style="width: 435px;">
									<option value="">Seleccione Talla</option>
										<?php foreach ($talla as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                </div>
                                     </div>

                     <div class="modal-footer datos-cent">
                        <button type="submit" class="btn btn-success">Aceptar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                  </div>
                   </form>
                     </div>
                   </div>
                 </div>
               </div>

<script>
               $('.editbtn').on('click',function () {

                  $tr=$(this).closest('tr');
                  var datos=$tr.children("td").map(function() {
                   return $(this).text();

                  });
                  
                  $('#ide').val(datos[0]);
                  $('#prdu').val(datos[1]);
                  $('#preC').val(datos[2]);
                  $('#preV').val(datos[3]);
                  $('#edic').val(datos[4]);
                  $('#tip').val(datos[5]);
                  $('#cant').val(datos[6]);
                  $('#sta').val(datos[8]);
                  $('#marc').val(datos[9]);
                  $('#ekipo').val(datos[11]);
                  $('#tem').val(datos[13]);
                  $('#tal').val(datos[15]);
               });   
               </script>
        
      <!-- Footer Start -->
      <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Contactanos</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Plaza Innova, Piedras Negras, MX</p>
                                <p><i class="fa fa-envelope"></i>GoalGear@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+52-878-137-0387</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Siguenos</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Empresa</h2>
                            <ul>
                                <li><a href="#">Conocenos</a></li>
                                <li><a href="#">Politica de privacidad</a></li>
                                <li><a href="#">Terminos y Condiciones</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Mas informacion</h2>
                            <ul>
                                <li><a href="#">Politicas de pagos</a></li>
                                <li><a href="#">Politicas de compras</a></li>
                                <li><a href="#">Politicas de devoluciones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>Aceptamos:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Protegido por:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                       
                    </div>

                    <div class="col-md-6 template-by">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-MX.json'
            }
        });
    });
    
</script>
    </body>
</html>
<?php } ?>