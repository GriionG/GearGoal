<?php 

 session_start();

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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style1.css" rel="stylesheet">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

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
	var emailField = document.getElementById('txtCorreo');
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value) ){
		return true;
	}else{
		alert('El correo es invalido | ejamplo: Jose123@gmail.com');
		return false;
	}
        
        	var pass = document.getElementById('txtContraseña');

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

function validateEmail(){
                
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
} 

function validaPass(){
	var pass = document.getElementById('txtcontraseña');

	var  validPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/  ;

	if( validPass.test(pass.value) ){
		return true;
	}else if (pass.length < 8) {
		alert('La contraseña debe de tener al menos 8 caracteres');
		return false;
	}else{
		alert('La contraseña debe de tener al menos una mayuscula, una minuscula, un numero y al menos 8 caracteres | ejamplo: ABCabc12');
		document.getElementById('txtcontraseña').value='';
        document.getElementById('txtcontraseña-confirm').value='';
		return false;
	}

}

    function soloLetras(e) {
  	key = e.keyCode || e.which;
  	tecla = String.fromCharCode(key).toLowerCase();
  	letras = "áéíóabcdefghijklmnñopqrstuvwxyz";
  	especiales = "8-37-39-46";

  	tecla_especial = false
  	for(var i in especiales){

  		if (key == especiales[i]) {
  			tecla_especial = true;
  			break;
  		}
  	}

  	if (letras.indexOf(tecla)==-1 && !tecla_especial) {
  		alert ("Favor de ingreser solo letras");
  		return false;
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
        	// Archivo para conectar con la BD de mysql
        require 'bd/conexion_bd.php';
			// Objeto de la clase BD_PDO
        $obj = new BD_PDO();

        if(isset($_POST['btnregistrar']))
        {
            @$email = $_POST['txtcorreo'];
            @$password = $_POST['txtcontraseña'];
            @$passwordverificar = $_POST['txtcontraseña'];
            @$passwordconfirma = $_POST['txtcontraseña-confirm'];
			@$nombre = $_POST['txtnombre'];
			@$apellido = $_POST['txtapellido'];
			@$direccion = $_POST['txtdireccion'];
            @$numcel = $_POST['txtNumcel'];
            @$descripcion = $_POST['txtdescripcion'];
            @$privilegio = "Usuario";
            @$discapacidad = $_POST['frmdiscapacidad'];


            	//Encrypto la contraseña
            $password = password_hash($password,PASSWORD_DEFAULT);
				//Guardo la fecha
            
            if(@$passwordverificar==@$passwordconfirma)
            {
				$datos = $obj->Ejecutar_Instruccion("INSERT INTO usuarios( `email`, `password`, `nombre`, `apellidos`, `direccion`, `telefono`, `descripcion`, `privilegio`, `discapasidad`) VALUES('$email','$password','$nombre','$apellido','$direccion','$numcel','$descripcion','$privilegio','$discapacidad')");
            
                $datos = $obj->Ejecutar_Instruccion("Select * from usuarios where email = '$email'" );

                if (@$datos[0][0]>0) {
    		echo "<script>alert('Bienvenido')</script>";
    		@$_SESSION['id_usuario'] = $datos[0][0];
    		@$_SESSION['email'] = $datos[0][1];
    		@$_SESSION['password'] = $datos[0][2];
    		@$_SESSION['privilegio'] = $datos[0][8];

        echo '<script>window.location = "index.php"; </script>';
            }
        
           }

           else
           {
               echo '<script>alert("Sus contraseñas no son iguales, favor de verificarlas")</script>';
           }

           
    }

      
        ?>

    <body style=" background-image: url('img/foto-31.png');
    background-color:  rgba(244, 58, 80, .5); /* Color rojo con opacidad 0.5 */
    background-blend-mode: overlay; /* Mezcla la imagen de fondo y el color */
    background-size: clover; /* Ajusta la imagen de fondo para cubrir todo el área */
    background-position: center; /* Centra la imagen de fondo */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    height: 100vh; /* Altura igual a la altura de la ventana del navegador */">
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
                            <br>
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
        

                <!-- Login Start -->
                <div class="login" style="padding-right: 0px; padding-left: 400px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">    
                        <div class="register-form">
                            <div class="row">
                            <form action="register.php" id="frminsertar" name="frminsertar" method="POST" autocomplete="off" onsubmit="return validar()">
                                <div class="col-md-10">
                                    <label>Nombre (s)</label>
                                    <input class="form-control" type="text" placeholder="Nombre (s)" name="txtnombre" id="txtnombre" maxlength="50" minlength="2" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Apellido (s)"</label>
                                    <input class="form-control" type="text" placeholder="Apellido (s)" name="txtapellido" id="txtapellido" maxlength="60" minlength="3" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" placeholder="Correo" name="txtcorreo" id="txtcorreo" maxlength="100" minlength="8" data-validation-required-message="Por favor ingresa tu usuario." 
                                     onblur="javascript: buscar_usuario(this.value);" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Num. Celular</label>
                                    <input class="form-control" type="number" placeholder="Numero Celular" name="txtNumcel" id="txtNumcel" pattern="[0-9]+" maxlength="10" minlength="10" onkeypress="return check(event)" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Contraseña</label>
                                    <input class="form-control" type="password" placeholder="Contraseña" name="txtcontraseña" id="txtcontraseña" maxlength="50" minlength="8"  onblur="javascript: validaPass(this.value)" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Confirma Contraseña</label>
                                    <input class="form-control" type="password" placeholder="Confirma contraseña" name="txtcontraseña-confirm" id="txtcontraseña-confirm"  maxlength="50" minlength="8"  onblur="javascript: validaPass(this.value)" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Direccion</label>
                                    <input class="form-control" type="text" placeholder="Direccion" name="txtdireccion" id="txtdireccion"  minlength="20" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>Descripcion</label>
                                    <input class="form-control" type="text" placeholder="Descripcion" name="txtdescripcion" id="txtdescripcion" minlength="20" style="width: 477px;">
                                </div>
                                <div class="col-md-10">
                                    <label>¿discapacidad?</label>
                                    <select  name="frmdiscapacidad" id="frmdiscapacidad" class="form-control" style="width: 477px;">
									    <option disabled selected value="" >Seleccione Discapacidad</option>
									    <option value = "Daltonico">Daltonismo</option>
            	                        <option value = "Miope">Problemas de vista</option>
            	                        <option value = "Ciego">Ciego</option>
                                        <option value = "Ninguna">Ninguna</option>
            	                </select>
                                <input type="checkbox" name="cajita" onclick="mostrar()"> <label>Mostrar contraseña</label>
                                </div>
                                <div class="col-md-12" style="padding-left:46%;">
                                <input type="submit" name="btnregistrar" id="btnregistrar" class="btn" value="Entre" >
                                    
                                </div>
                            </from>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
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
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
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
