
<?php 

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    // Usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("location: login.php");
    exit;
}

if(isset($_SESSION['discapacidad'])) {
    @$discapacidad = $_SESSION['discapacidad'];
    // Aquí puedes utilizar la variable $discapacidad según sea necesario en tu página index.php
    // Por ejemplo, puedes cambiar el estilo de la página según la discapacidad del usuario
    // if($discapacidad == 'daltonismo') {
    //     // Cambiar el estilo para usuarios con daltonismo
    //     echo '<link href="css/style-daltonismo.css" rel="stylesheet">';
    // }
}


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
        <script src="https://kit.fontawesome.com/f7f523ca7f.js" crossorigin="anonymous"></script>
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

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
        var nom = document.getElementById("txtnombre").value;
        var apell = document.getElementById("txtapellido").value;
        var correo = document.getElementById("txtcorreo").value;
        var cel = document.getElementById("txtNumcel").value;
        var contra = document.getElementById("txtcontraseña").value;
        var pass = document.getElementById("txtcontraseña-confirm").value;
        var dirre = document.getElementById("txtdireccion").value;
        var discrip = document.getElementById("txtdescripcion").value;

        if (nom.trim().length<1) 
        {
            alert("El campo de nombre (s) esta vacio");
            return false;
        }

        if (apell.trim().length<1) 
        {
            alert("El campo de apellido (s) esta vacio");
            return false;
        }

        if (correo.trim().length<1) 
        {
            alert("El campo de correo esta vacio");
            return false;
        }

        if (cel.trim().length<1) 
        {
            alert("El campo de Num. Celular esta vacio");
            return false;
        }

        if (contra.trim().length<1) 
        {
            alert("El campo de Contraseña esta vacio");
            return false;
        }

        if (pass.trim().length<1) 
        {
            alert("El campo de Confirma Contraseña esta vacio");
            return false;
        }

        if (dirre.trim().length<1) 
        {
            alert("El campo de Direccion esta vacio");
            return false;
        }

        if (discrip.trim().length<1) 
        {
            alert("El campo de Descripcion esta vacio");
            return false;
        }
        
        
        
        $.getJSON("datos.php?id_usuario=" + id).done(function(datos)  
    {
      if (datos[0][0]>0) 
      {
        alert("Usuario ya existe, inserte otro correo");
        document.getElementById('txtcorreo').value='';
      }
        
    });  
    
    // Get our input reference.
	var emailField = document.getElementById('txtcorreo');
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value) ){
		return true;
	}else{
		alert('El correo es invalido | ejamplo: Jose123@gmail.com');
		return false;
	}
        
        	var pass = document.getElementById('txtcontraseña');

	var  validPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/  ;

	if( validPass.test(pass.value) ){
		return true;
	}else if (pass.length < 8) {
		alert('La contraseña debe de tener al menos 8 caracteres');
		return false;
	}else{
		alert('La contraseña debe de tener al menos una mayuscula, una minuscula, un numero y al menos 8 caracteres | ejamplo: ABCabc12');
		document.getElementById('txtContraseña').value='';
		return false;
	}

}

		
		function eliminar(id){
			if (confirm("¿Estas seguro de eliminar tu cuenta?")) {

				window.location = "Perfil.php?ideliminar=" + id;

			}
		}

		function modificar(id){
			window.location = "Perfil.php?idmodificar=" + id;
		}

		function cerrar_sesion()
		{
			if (confirm("¿Estas seguro de cerrar la sesion")) {
				window.location = "cerrar_sesion.php"
			}
		}

        function mostrar(){
    var pass = document.getElementById('txtcontraseña');
    if (pass.type==="password") {
        pass.type="text";
    }else{
        pass.type="password";
    }


        return true;
    }

function buscar_usuario(id)
{
    if (confirm("¿Estas seguro de Cambiar tu correo?")) {
				
			
    $.getJSON("datos.php?id_usuario=" + id).done(function(datos)  
    {
      if (datos[0][0]>0) 
      {
        alert("Usuario ya existe, inserte otro correo");
        document.getElementById('txtcorreo').value='';
      }

        
    });  

    // Get our input reference.
	var emailField = document.getElementById('txtcorreo');
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value) ){
		return true;
	}else{
		alert('El correo es invalido | ejamplo: Jose123@gmail.com');
        document.getElementById('txtcorreo').value='';
		return false;
	}
    }
    
}

    function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


</script>
    </head>
    <?php 
require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();
    //Comprarobar que jale | $result = $obj->Ejecutar_Instruccion("select * from categorias");

        @$editar = $obj->Ejecutar_Instruccion("Select * from usuarios where id_usuario='".$_SESSION['id_usuario']."'" );

 @$_SESSION['id_usuario'] = $editar[0][0];

        if (isset($_POST['btninsertar'])){

            @$email = $_POST['txtcorreo'];
            @$password = $_POST['txtcontraseña'];
			@$nombre = $_POST['txtnombre'];
			@$apellido = $_POST['txtapellido'];
			@$direccion = $_POST['txtdireccion'];
            @$numcel = $_POST['txtNumcel'];
            @$descripcion = $_POST['txtdescripcion'];
            @$privilegio = "Usuario";  
            @$pregunta = $_POST['frmpregunta'];   
            @$respuesta = $_POST['txtrespuesta'];   

        if ($_POST['btninsertar']=='Insertar'){
		$obj->Ejecutar_Instruccion("INSERT INTO usuarios( `email`, `password`, `nombre`, `apellidos`, `direccion`, `telefono`, `descripcion`, `privilegio`, `pregunta`, `respuesta`) VALUES('$email','$password','$nombre','$apellido','$direccion','$numcel','$descripcion','$privilegio','$pregunta','$respuesta')");

		//var_dump("insert into tblclientes(Nombre, ApPaterno, ApMaterno, Fecha, TelCliente, Calle, NumCasa, Colonia, CP, Referencias, IDUsuario) values ('$Nombre','$AP','$AM','$FechaNac','$NumeroC','$Calle','$NumeroC','$Colonia','$CP','$Referencia','".$_SESSION['IdUsuario']."')");
	
    }
	elseif($_POST['btninsertar']=='Guardar'){
		$id_usuario = $_SESSION['id_usuario'];
        $obj->Ejecutar_Instruccion("update usuarios set email='$email', password='$password', nombre='$nombre', apellidos='$apellido',direccion='$direccion', telefono='$numcel', pregunta='$pregunta', respuesta='$respuesta' where id_usuario = '$id_usuario'");
	}

        }

        elseif (isset($_GET['ideliminar'])) {

		$id = $_GET['ideliminar'];
		$obj->Ejecutar_Instruccion("Delete from usuarios where id_usuario = '$id' ");
	}
		elseif (isset($_GET['idmodificar'])) {

		$id = $_GET['idmodificar'];
		$editar = $obj->Ejecutar_Instruccion("Select * from usuarios where id_usuario = '$id' ");
		$_SESSION['IDClientes'] = $id;
	}
 
    //$result = $obj->Ejecutar_Instruccion("select IDClientes,Nombre,ApPaterno,ApMaterno,Fecha,TelCliente,Calle,NumCasa,Colonia,CP,Referencias,tblclientes.IDUsuario,Correo FROM tblclientes INNER JOIN tblusuario ON tblclientes.IDUsuario = tblusuario.IDUsuario");
    
@$editar = $obj->Ejecutar_Instruccion("Select * from usuarios where id_usuario = '".@$_SESSION['id_usuario']."'" );

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
                            <a href="index.php" class="nav-item nav-link">Inicio</a>
                            <a href="product-list.html" class="nav-item nav-link">Productos</a>
                            <a href="product-detail.html" class="nav-item nav-link">Detalles de prductos</a>
                            <a href="cart.html" class="nav-item nav-link">Carrito</a>
                            <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.php" class="nav-item nav-link">Conocenos</a>
                                <?php
                                 if (@$_SESSION['privilegio']=='Usuario' | @$_SESSION['privilegio']=='Admin') {
                                 ?>
                               <a href="contact.php" class="nav-item nav-link">Contactanos</a>
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
                                    <a href="porfile.php" class="dropdown-item active">Perfil</a>
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
                            <a href="index.php">
                                <img style="max-width: 60%; height: 100px; width: 60%;" src="img/Logo-goal.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
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
                    <li class="breadcrumb-item active">Perfil</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#datos-persoanles-tab" role="tab"><i class="fa-solid fa-user"></i>Datos Personales</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#datos-usuario-tab" role="tab"><i class="fa-solid fa-user-secret"></i>Datos de Usuario</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#datos-domicilio-tab" role="tab"><i class="fa-solid fa-house"></i>Datos de Domicilio</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#recuperar-pass-tab" role="tab"><i class="fa-solid fa-at"></i>Pregunta de recuperacion</a>
                            <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Regresar</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                        <div class="col-lg-8">    
                        <div class="register-form">
                            <div class="row">
                            <div class="tab-pane fade show active" id="datos-persoanles-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h2>Datos Persoanles</h2>
                                <form action="porfile.php" id="frminsertar" name="frminsertar" method="POST" autocomplete="off" onsubmit="return validar()">
                                <div class="col-md-11">
                                <input class="input" type="hidden" name="txtid_usuario" readonly placeholder="ID Usuario" value="<?php echo @$editar[0][0] ?>">
                                    <label>Nombre (s)</label>
                                    <input class="form-control" type="text" placeholder="Nombre (s)" name="txtnombre" id="txtnombre" maxlength="50" minlength="2" value="<?php echo @$editar[0][3] ?>" style="width: 633px;">
                                </div>
                                <div class="col-md-11">
                                    <label>Apellido (s)"</label>
                                    <input class="form-control" type="text" placeholder="Apellido (s)" name="txtapellido" id="txtapellido" maxlength="60" minlength="3" value="<?php echo @$editar[0][4] ?>" style="width: 633px;">
                                </div>
                                <div class="col-md-11">
                                    <label>Num. Celular</label>
                                    <input class="form-control" type="text" placeholder="Numero Celular" name="txtNumcel" id="txtNumcel" pattern="[0-9]+" maxlength="10" minlength="10" onkeypress="return check(event)" value="<?php echo @$editar[0][6] ?>" style="width: 633px;">
                                </div>
                                
                                </div>
                               </div>
                              </div>
                           </div>
                            <div class="col-lg-8">    
                            <div class="register-form">
                            <div class="row">
                            <div class="tab-pane fade" id="datos-usuario-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <br>
                                <h2>Datos de Usuario</h2>
                                <div class="col-md-11">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" placeholder="Correo" name="txtcorreo" id="txtcorreo" maxlength="100" minlength="8" data-validation-required-message="Por favor ingresa tu usuario." 
                                     onblur="javascript: buscar_usuario(this.value);" value="<?php echo @$editar[0][1] ?>" style="width: 633px;">
                                </div>
                                <div class="col-md-11">
                                    <label>Contraseña</label>
                                    <input class="form-control" type="password" placeholder="Contraseña" readonly name="txtcontraseña" id="txtcontraseña" maxlength="50" minlength="8"  onblur="javascript: validaPass(this.value)" value="<?php echo @$editar[0][2] ?>" style="width: 633px;">
                                    <input type="checkbox" name="cajita" onclick="mostrar()"> <label>Mostrar contraseña</label>
                                </div>

                                </div>
                               </div>
                              </div>
            </div>
            <div class="col-lg-8">    
                        <div class="register-form">
                            <div class="row">
                            <div class="tab-pane fade" id="datos-domicilio-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <br>
                                <h2>Datos de Direccion</h2>
                                <div class="col-md-11">
                                    <label>Direccion</label>
                                    <input class="form-control" type="text" placeholder="Direccion" name="txtdireccion" id="txtdireccion"  minlength="20" value="<?php echo @$editar[0][5] ?>" style="width: 633px;">
                                </div>
                                <div class="col-md-11">
                                    <label>Descripcion</label>
                                    <input class="form-control" type="text" placeholder="Descripcion" name="txtdescripcion" id="txtdescripcion" minlength="20" value="<?php echo @$editar[0][7] ?>" style="width: 633px;">
                                </div>
                                </div>
                               </div>
                              </div>
                           </div>

                            <div class="col-lg-8">    
                        <div class="register-form">
                            <div class="row">
                            <div class="tab-pane fade" id="recuperar-pass-tab" role="tabpanel" aria-labelledby="account-nav">
                                <br>
                                <h2>Recuperación de contraseña</h2>
                                <div class="col-md-11">
                                <label>Pregunta de recuperación de contraseña</label>
                <select name="frmpregunta" id="frmpregunta" class="form-control" style="width: 633px;">
                    <option disabled selected value="">Seleccione una pregunta</option>
                    <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
                    <option value="¿Cuál es el nombre de tu mejor amigo?">¿Cuál es el nombre de tu mejor amig@?</option>
                    <option value="¿Cuál es tu color favorito?">¿Cuál es tu color favorito?</option>
                    <option value="¿Cuál es tu equipo de fútbol favorito?">¿Cuál es tu equipo de fútbol favorito?</option>
                    <option value="¿Cuál es tu dorsal de fútbol?">¿Cuál es tu dorsal de fútbol?</option>
                    <?php echo @$editar[0][10] ?>
                </select>
                                </div>
                                <div class="col-md-11">
                                <label>Respuesta para recuperar contraseña</label>
                <input class="form-control" type="text" placeholder="Respuesta" name="txtrespuesta" id="txtrespuesta" minlength="1" value="<?php echo @$editar[0][11] ?>" style="width: 633px;">
                                </div>
                                <br>
                                <div class="" style="padding-left:64%;">

                                <input type="submit" class="btn" id="btninsertar" name="btninsertar" value="<?php 
	                            if (isset($editar[0][0] )){
	    	                    echo 'Guardar';
	                                    }
	                             else {
	    	                    echo 'Insertar';
	                            }?>">

                                </div>
                                
                                </div>
                               </div>
                              </div>
                           </div>
                            </from>
            </div>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
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
    </body>
</html>
