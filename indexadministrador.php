<?php
session_start();
# Inicia Código de ingresar contraseña

if (isset($_POST['aceptar'])) {  
  require 'conexion.php';

    $email = $_POST['email'];
  $clave = $_POST['clave'];

    $query=$cnnPDO->prepare('SELECT * from admi WHERE email=:email and clave=:clave');

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
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Index</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <div class="hero_social">
      <a href="">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>
    

 <header>
  
  <div class="navbar navbar-expand-lg navbar-blue bg-blue ">
    <div class="container">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        
        <h1>Biker house Saltillo</h1><pre>                                                 </pre>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="logout1.php"> Iniciar sesión </a>
              </li>
            </ul>
          </div>

    </div>
  </div>
</header>






  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-9 col-lg-6 ">
          <h1>Bienvenido Administrador</h1>
          <div class="img-box">
            <img src="images/moto.png" alt="">
          </div>
        </div>
        <div class="col-md-2 col-lg-6">
          <div class="detail-box">
            
            <form id="enviar" method="post">

              <div class="col-md-10 col-lg-16 col-xl-15 order-2 order-lg-1">

                <center>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">

                      <form method="post">
                        <h1>Iniciemos</h1>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    

                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Correo</label>
                      <input type="text" name="email" id="email" class="form-control" />
                    </div>
                    
                  </div>
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Password</label>
                      <input type="Password" name="clave" id="clave" class="form-control" />
                    </div><br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="aceptar" class="btn btn-primary btn-lg">Aceptar</button>
                  </div>

                </form>
                
                      </div>
                </center>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
<footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              Sobre
            </h4>
            <p>
              Biker House se dedica a la comercializacion de productos de la mejor calidad en el mercado para los omtociclistas, como cascos, guantes, chamarras, pantalones accesorios para tu moto y mucho mas.
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Ubicanos en...
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Locacion
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  llamanos +52 8442630668
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  correo alondrajaki4567@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> Biker House @2022
          
        </p>
      </div>
    </div>
  </footer>
  
  <!-- footer section -->
  

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>