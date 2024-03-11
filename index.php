<?php
session_start();
# Inicia Código de ingresar contraseña

if (isset($_POST['aceptar'])) {  
  require 'conexion.php';

    $email = $_POST['email'];
  $clave = $_POST['clave'];


    $query=$cnnPDO->prepare('SELECT * from admi WHERE email=:email and clave=:clave ');

    $query->bindParam(':email',$email);
    $query->bindParam(':clave',$clave);
    
    $query->execute();

    $count=$query->rowCount();
    $campo = $query->fetch();

    if ($count)
    {
      $_SESSION['email'] = $campo['email'];
      $_SESSION['clave'] = $campo['clave'];
      
      header("location:indexadmi.php");
    }
    
}
  ob_end_flush();
  #termina el codigo de ingresar contraseña
  ?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>FerreteraARA</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
<!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
  </head>

<body>

   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Ferretera ARA</em></a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">

    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->


  
  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4>BIENVENIDO ADMINISTRADOR<br> <em> A INICIO DE TU CUENTA</em> </h4>
              
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
              <h6>Aqui deberas de ingresar<br> tus datos de usuario</h6>
            </div>
            <form  action="" method="post">
              <div class="row">
                
                <div class="col-md-12">
                  <fieldset>
                    <input name="email" id="email" type="text" class="form-control" placeholder="USUARIO" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="clave" id="clave" type="password" class="form-control" placeholder="CONTRASEÑA" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button  id="aceptar" name="aceptar" class="btn  btn-outline-light"  type="submit">Iniciar Sesión</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>