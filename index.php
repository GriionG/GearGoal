
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
    </head>
<?php 
require 'bd/conexion_bd.php';

$obj = new BD_PDO();

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
                            <a href="index.php" class="nav-item nav-link active">Inicio</a>
                            <a href="product-list.php" class="nav-item nav-link">Productos</a>
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
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/Liga-premier-logo.png" style="height: 15%; width: 10%" alt="Logo Premier League"><i></i>Premier League</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/laliga-logo.png" style="height: 10%; width: 10%" alt="Logo La Liga"><i></i>La Liga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/serie-A-logo.png" style="height: 10%; width: 10%" alt="Logo Serie A"><i></i>Serie A</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link center" href="product-list.php"><img src="img/bundesliga-logo.png" style="height: 10%; width: 10%" alt="Logo  Bundesliga"><i></i>Bundesliga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/ligue-1-logo.png" style="height: 10%; width: 10%" alt="Logo Ligue 1"><i></i>Ligue 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/eredivisie-logo.png" style="height: 10%; width: 10%" alt="Logo Eredivisie"><i></i>Eredivisie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/MLS-logo.png" style="height: 10%; width: 10%" alt="Logo MLS"><i></i>MLS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php"><img src="img/liga-MX-logo.png" style="height: 10%; width: 10%" alt="Logo Liga MX"><i></i>Liga MX</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/foto-1.jpg" style="padding-left: 14%;" alt="Foto de modelo con Jersey visitante de Milan" />
                                <div class="header-slider-caption">
                                    <p>Los mejores Jerseys de los mejores equipos</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compre ahora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/foto-2.jpg" style="padding-left: 14%;" alt="Foto de modelo con Jersey local de Manchester City" />
                                <div class="header-slider-caption">
                                    <p>Los mejores Jerseys a los mejores precios</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/foto-7.jpg" style="height: 100%; width: 100%; padding-top: 2%;" alt="Foto de Jugadores con Jersey local de Bayern Munich" />
                                <div class="header-slider-caption">
                                    <p>Equipacion de ganadores para los ganadores</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/foto-8.jpg" style="height: 100%; width: 100%; ;" alt="Foto de Jersey local de Monterrey" />
                                <a class="img-text" href="">
                                    <p>Jersey de leyendas</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="img/foto-9.jpg" style="height: 100%; width: 100%; " alt="Foto de Jersey local de Inter Maiami" />
                                <a class="img-text" href="">
                                    <p>Jerseys Internacionales de selecciones</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/adidas-logo.png" style="height: 100%; width: 100%; padding-top: 23%;" alt="Logo de marca Adidas"></div>
                    <div class="brand-item"><img src="img/nike.png" style="height: 100%; width: 75%; padding-top: 30%;" alt="Logo de marca Nike"></div>
                    <div class="brand-item"><img src="img/puma-logo.png"  style="" alt="Logo de marca Puma"></div>
                    <div class="brand-item"><img src="img/newbalance-logo.png"  style="height: 100%; width: 80%; padding-top: 13%;" alt="Logo de marca NewBalance"></div>
                    <div class="brand-item"><img src="img/umbro-logo.png"  style="height: 100%; width: 65%; padding-top: 29%;" alt="Logo de marca Umbro"></div>
                    <div class="brand-item"><img src="img/kapa logo.png" style="padding-top: 23%;" alt="Logo de marca Kappa"></div>
                    <div class="brand-item"><img src="img/priam-logo.png" style="height: 100%; width: 70%; padding-top: 24%;" alt="Logo de marca Prima"></div>
                    <div class="brand-item"><img src="img/charly-logo.png"  style="height: 100%; width: 100%; padding-top: 0%;" alt="Logo de marca Charly"></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Pago seguro</h2>
                            <p>
                                Contamos con pago seguro en todas nuestras ventas y te aseguramos que tus compras llegaran a tu hogar 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Envios a todo el mundo</h2>
                            <p>
                                Contamos  con envios a cualquier lugar del mundo 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Devulucion en 30 dias</h2>
                            <p>
                                Si no estas contento con tu compra aprovecha la promocio de devolucion en 30 dias de haber resivido tu compra
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Soporte 24/7</h2>
                            <p>
                                Contamos con soporte en todas las horas todos los dias
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/foto-13.jpg" />
                            <a class="category-name" href="">
                                <p>El Jersey del GOAT</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/foto-11.jpg" />
                            <a class="category-name" href="">
                                <p>Jerseys Para todos y todas</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/foto-12.jpg" style="" />
                            <a class="category-name" href="">
                                <p>Supera tus limites y se como CR7</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/foto-14.jpg"  />
                            <a class="category-name" href="">
                                <p>Los mejores Equipos del mundo</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/foto-32.jpg" style="" />
                            <a class="category-name" href="">
                                <p>Jersys de campeones</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/foto-6.jpg" alt="Foto de modelos con Jersey marca prima de cruz azul" />
                            <a class="category-name" href="">
                                <p>Los mejores Jerseys de Prima</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>LLama cuando quieras</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:528781370387">+52 878-138-0387</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Productos mas frecuentes</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-19.png" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-20.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-21.jpeg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-22.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-23.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- <h1>Subscribe Our Newsletter</h1>-->
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <!-- <input type="email" value="Your email here">
                            <button>Submit</button> -->
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Productos Recientes</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-4.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-27.png" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-26.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-28.jpg" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Nombre de producto</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="img/foto-30.png" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>99</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compra ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start 
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Review End -->        
        
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
