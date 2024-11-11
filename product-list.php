<?php 

session_start();

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

    </head>

    <?php 

require 'bd/conexion_bd.php';

$obj = new BD_PDO();

$marca = $obj->Ejecutar_Instruccion("SELECT * FROM marca");
$equipo = $obj->Ejecutar_Instruccion("SELECT * FROM equipos");
$temporadas = $obj->Ejecutar_Instruccion("SELECT * FROM temporadas");
$talla = $obj->Ejecutar_Instruccion("SELECT * FROM tallas");
$ligas = $obj->Ejecutar_Instruccion("SELECT * FROM liga");


// Verificar si se hizo clic en el botón "Comprar ahora"
if (isset($_POST['btn_comprar'])) {
    // Obtener la información del producto desde el formulario
    $producto_id = $_POST['txtidproducto'];
    $precio_producto = $_POST['txtprecioprodu'];
    $cantidad_producto = $_POST['txtcantidadprodu'];

    // Obtener el ID del usuario desde la sesión
    $usuario_id = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

    // Obtener la fecha actual
    $fecha_actual = date("Y-m-d");

    // Calcular el total de la compra
    $total_compra = $precio_producto * $cantidad_producto;

    try {
        // Insertar el producto en el carrito
        $result = $obj->Ejecutar_Instruccion("INSERT INTO carrito (id_usuario, id_producto, cantidad, total, fecha) VALUES ('$usuario_id', '$producto_id', '$cantidad_producto', '$total_compra', '$fecha_actual')");
        
            
          echo '<script> if (confirm("¿Deseas seguir viendo productos?")) {

              window.location = "product-list.php"; 
    
             }
             else{
               window.location = "cart.php"; 
             } </script>';
    } catch (PDOException $e) {
        echo "<script>alert('Error al agregar el producto al carrito')</script>";
        echo '<script>window.location = "login.php"; </script>';
    }
}


if (isset($_POST['btnbuscar'])){
    @$buscar = $_POST['txtbuscar'];
    $result = $obj->Ejecutar_Instruccion("SELECT productos.id_producto,productos.nombre,productos.precioC,productos.precioV,productos.edicion,productos.equipacion,productos.cantidad,productos.img,productos.estado,productos.marca_fk,marca.nombre,productos.equipo_fk,equipos.nombre,productos.temporada_fk,temporadas.anos,productos.talla_fk,tallas.nombre
    FROM productos
    INNER JOIN marca ON productos.marca_fk = marca.id_marca
    INNER JOIN equipos on productos.equipo_fk = equipos.id_equipo
    INNER JOIN temporadas ON productos.temporada_fk = temporadas.id_temporada
    INNER JOIN tallas on productos.talla_fk = tallas.id_talla WHERE productos.nombre LIKE '%$buscar%' or productos.precioV LIKE '%$buscar%' or equipos.nombre LIKE '$buscar%' or marca.nombre LIKE '$buscar%' or temporadas.anos LIKE '%$buscar%'");
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
                            <a href="index.php" class="nav-item nav-link ">Inicio</a>
                            <a href="product-list.php" class="nav-item nav-link active">Productos</a>
                            <a href="cart.php" class="nav-item nav-link">Carrito</a>
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
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-search">
                                            <form action="product-list.php" method="post">
                                                <input type="text"  class="form-control" name="txtbuscar" id="txtbuscar" placeholder="Buscar">
                                                <button type="submit" name="btnbuscar" id="btnbuscar" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-4">
    <?php foreach ($result as $renglon) { ?>
        <div class="product-item">
            <div class="product-title">
                <a href="#"><?php echo $renglon[1]; ?></a> 
            </div>
            <div class="product-image">
                <a href="product-detail.html">
                    <img src="<?php echo $renglon[7]; ?>" alt="Product Image">
                </a>
                <form action="product-list.php" method="post">
                <input type="hidden" name="txtidproducto" value="<?php echo @$renglon[0] ?>"> <!-- ID del producto -->
                <input type="hidden" name="txtprecioprodu" value="<?php echo @$renglon[3] ?>"> <!-- Precio del producto -->
                <input type="hidden" name="txtcantidadprodu" value="1">
                <div class="product-action">
                    <a name="btn_comprar" id="btn_comprar"><i class="fa fa-cart-plus"></i></a>
                    <a href="#"><i class="fa fa-heart"></i></a>
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="product-price">
                <h3><span>$</span><?php echo $renglon[3]; ?></h3>
                <button type="submit" name="btn_comprar" id="btn_comprar" class="btn" value="Comprar Ahora"><i class="fa fa-shopping-cart"></i>Comprar Ahora</button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
</div>

                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Ligas</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                <?php foreach ($ligas as $renglon) { ?>
						
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class=""></i><?php echo $renglon[1]; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php foreach ($result as $renglon) { ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $renglon[1]; ?></a>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="<?php echo $renglon[7]; ?>" alt="Product Image">
                                        </a>
                                        <form action="product-list.php" method="post">
                <input type="hidden" name="txtidproducto" value="<?php echo @$renglon[0] ?>"> <!-- ID del producto -->
                <input type="hidden" name="txtprecioprodu" value="<?php echo @$renglon[3] ?>"> <!-- Precio del producto -->
                <input type="hidden" name="txtcantidadprodu" value="1">
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span><?php echo $renglon[3]; ?></h3>
                                        <button type="submit" name="btn_comprar" id="btn_comprar" class="btn" value="Comprar Ahora"><i class="fa fa-shopping-cart"></i>Comprar Ahora</button>
                </form>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget tag">
                        <h2 class="title">Equipos Mas Buscados</h2>
                        <?php foreach ($equipo as $renglon) { ?>
                            <a href="product-list.php?termino=<?php echo urlencode($renglon[1]); ?>"><?php echo $renglon[1]; ?></a>
                            <?php } ?>
                        </div>
                        
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
           
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
