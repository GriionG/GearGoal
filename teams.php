
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
        var team = document.getElementById("txtequipo").value;
        var cate = document.getElementById("frmcategoria").value;
        var liga = document.getElementById("frmliga").value;
        var marca = document.getElementById("frmmarca").value;

        if (team.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (cate.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (liga.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (marca.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }

}

function verificar_equipo(id)
	{
	  $.getJSON("Validaciones/verificar_equipo.php?p=" + id).done(function(datos)  
	    {
	      if (datos[0][0]>0) 
	      {
	        alert("Este equipo ya existente");
	        window.location="teams.php";
	      }        
	    });  
    
    }

    function validarmodal()
    {
        var team = document.getElementById("equi").value;
        var cate = document.getElementById("cate").value;
        var liga = document.getElementById("lig").value;
        var marca = document.getElementById("marc").value;

        if (team.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (cate.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (liga.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }
        if (marca.trim().length<1) 
        {
            alert("El campo periodo de temporada esta vacio");
            return false;
        }

}
		
        function eliminar(id){
         if (confirm("¿Estas seguro de eliminar el registro?")) {

            window.location = "teams.php?id_eliminar=" + id;

         }
      }

      function modificar(id){
         window.location = "teams.php?idmodificar=" + id;
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

if (isset($_POST['btninsertar'])){
    $equipo = $_POST['txtequipo'];
    $categoria = $_POST['frmcategoria'];
    $liga = $_POST['frmliga'];
    $marca = $_POST['frmmarca'];
    @$result = $obj->Ejecutar_Instruccion("INSERT INTO `equipos`(`nombre`, `categoria`, `fkliga`, `fkmarca`) VALUES ('$equipo','$categoria','$liga','$marca')");
    echo '<script>window.location = "teams.php"; </script>';
    }
    else if (isset($_GET['id_eliminar']))
        {
            $id = $_GET['id_eliminar'];
             $obj->Ejecutar_Instruccion("delete from equipos where id_equipo = '$id'");
        }
        if (isset($_POST['btnbuscar'])){
@$buscar = $_POST['txtbuscar'];
$result = @$obj->Ejecutar_Instruccion("select * from equipos WHERE nombre LIKE '%$buscar%' or categoria LIKE '%$buscar%' ");
}
else{
$result = $obj->Ejecutar_Instruccion("SELECT equipos.id_equipo,equipos.nombre,equipos.categoria,equipos.fkliga,liga.nombre,equipos.fkmarca,marca.nombre
FROM equipos
INNER JOIN liga ON equipos.fkliga = liga.id_liga
INNER JOIN marca on equipos.fkmarca = marca.id_marca");
}

$liga = $obj->Ejecutar_Instruccion("SELECT * FROM liga");
$marca = $obj->Ejecutar_Instruccion("SELECT * FROM marca");

@$datos =  $obj->Ejecutar_Instruccion("Select * from usuarios where id_usuario = '".@$_SESSION['id_usuario']."'" );
@$user = $datos[0][3]

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
                         <a href="teams.php" class="nav-item nav-link active">Equipos</a>
                         <a href="leagues.php" class="nav-item nav-link">Ligas</a>
                            <a href="product.php" class="nav-item nav-link">Productos</a>
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
                    <li class="breadcrumb-item active">Equipos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h1 class="text-uppercase">Equipos</h1>
                    </div>
                </div>
            </div>
                                </div>
        
        <!-- Login Start -->
        <div class="login" style="padding-left: 0px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5">    
                        <div class="register-form">
                        <h3 class="mb-30">Formulario</h3>
                            <div class="row">
                            <form action="teams.php" id="frminsertar" name="frminsertar" method="POST" autocomplete="off" onsubmit="return validar()">
                                <div class="col-md-10">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="txtequipo" id="txtequipo" placeholder="Nombre" onblur="javascript: verificar_equipo(this.value);" maxlength="20" minlength="2" style="width: 392px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Categoria</label>
                                    <select  name="frmcategoria" id="frmcategoria " class="form-control" style="width: 392px;">
									    <option disabled selected value="" >Seleccione Categoria</option>
									    <option value = "Masculino">Equipo Masculino</option>
            	                        <option value = "Femenino">Equipo Femenino</option>
            	                </select>
                                </div>
                                <div class="col-md-6">
                                <label>Liga</label>
                                <select id="frmliga" name="frmliga" class="form-control" style="width: 392px;">
									<option value="">Liga Perteneciente</option>
										<?php foreach ($liga as $renglon) { ?>
									<option value="<?php echo($renglon[0]) ?>"><?php echo $renglon[1]; ?></option>
										<?php } ?>
								</select>
                                        </div>
                                        <div class="col-md-6">
                                <label>Marca</label>
                                <select id="frmmarca" name="frmmarca" class="form-control" style="width: 392px;">
									<option value="">Marca Patrocinadora</option>
										<?php foreach ($marca as $renglon) { ?>
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
                    <div class="col-md-7">
                    <table class="table table-light table-hover" id="myTable">
                  <thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
            <td>Categoria</td>
            <td class="hidden">ID Liga</td>
            <td>Liga</td>
            <td class="hidden">ID Marca</td>
            <td>Marca</td>
			<td>Accion </td>
			
			
		</tr>
        </thead>
                  <tbody>
		<?php foreach (@$result as $renglon) { ?>
		<tr>
			<td><?php echo $renglon[0]; ?></td>
			<td><?php echo $renglon[1]; ?></td>
			<td><?php echo $renglon[2]; ?></td>
            <td class="hidden"><?php echo $renglon[3];?></td>
            <td><?php echo $renglon[4]; ?></td>
            <td class="hidden"><?php echo $renglon[5];?></td>
            <td><?php echo $renglon[6]; ?></td>
				<?php 
	 ?>

			<td style="text-align: center; "><a type="button" class="btn" id="btneliminar" name="btneliminar" value="Eliminar" onclick="javascript:eliminar('<?php echo $renglon[0];?>');" ><i class="fa-solid fa-delete-left"></i></a> 
            <a type="button" class="btn btn-danger editbtn" data-toggle="modal"data-target="#editar"><i class="fa-solid fa-pencil"></i></a> </td>
	

		</tr>
		<?php } ?>
        </tbody>
	   </table>
        </div>
                </div>
            </div>
        </div>
        <!-- Login End -->

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
                     <form action="teams-edit.php" method="POST" enctype="multipart/form-data" onsubmit="return validarmodal()">
                                     <div class="form-group">
                                <div class="col-md-10">
                                <input type="hidden" id="ide" name="txtid"  class="form-control" placeholder="ID">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="txtequipo" id="equi" placeholder="Nombre" style="width: 435px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Categoria</label>
                                    <select  name="frmcategoria" id="cate" class="form-control" style="width: 435px;">
									    <option disabled selected value="" >Seleccione Categoria</option>
									    <option value = "Masculino">Equipo Masculino</option>
            	                        <option value = "Femenino">Equipo Femenino</option>
            	                </select>
                                </div>
                                 <div class="col-md-10">
                                <label>Liga</label>
                                <select id="lig" name="frmliga" class="form-control" style="width: 435px;">
									<option value="">Liga Perteneciente</option>
										<?php foreach ($liga as $renglon) { ?>
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
                  $('#equi').val(datos[1]);
                  $('#cate').val(datos[2]);
				  $('#lig').val(datos[3]);
                  $('#marc').val(datos[5]);
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