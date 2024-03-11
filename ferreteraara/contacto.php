<?php  
  require 'config.php';
  require 'database.php';
?>


<!DOCTYPE html>
<html>
<head>  
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda online</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>

  
</head>
<style type="text/css">
	main>.container{
		padding: 30px 0;
	}
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <img class="img-fluid" src="./assets/img/logo.jpg" alt="" width="100px" height="100px">
            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Ferretera 
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comentarios.php">Comentarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quienessomos.php">¿Quiénes somos?</a>
                        </li>
                    </ul>

                </div>

                    
                    <li class="nav-item">
            <a href="checkout.php" class="btn btn-primary">
            Carrito<span id="num_cart" class="badge bg-secondary"> <?php echo $num_cart; ?> </span>
          </a>
          </li>
                    
                </div>
            </div>
            </div>  
    </nav>
<br> 
<center>
<section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-16">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contáctate con nosotros
              </h2>
            </div>
            <form id="Login" action="enviarmensaje.php" method="post">
              <div>
                <input id="nombre" name="nombre" type="text" placeholder="Nombre " />
              </div>
              <div>
                <input name="email" id="email" type="email" placeholder="Email" />
              </div>
              <div>
                <input id="mensaje" name="mensaje" type="text" class="message-box" placeholder="Mensaje" />
              </div>
                <button name="enviar" id="submit">
                  Enviar
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</center>
<br><br>

   <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <center>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Ferretera ARA</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Blvd. Fco. Coss #248 Ote. | Blvd. Moctezuma #1095
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none">(844-414-1520) |  (844-485-0058)</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" >contacto@ferreteraara.com</a>
                        </li><br>
                         <li>
                            <a class="text-decoration-none" >© 2023 Derechos Reservados Ferretera ARA</a>
                        </li>
                    </ul>
                </div>

            </div></center>

           
    </footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script>
		function addProducto(id, token){
			let url = 'carrito.php'
			let formData = new FormData()
			formData.append('id', id)
			formData.append('token', token)

			fetch(url,{
				method: 'POST',
				body: formData,
				mode: 'cors'
			})
			.then((response) => response.json())
			.then(data => {
				if(data.ok){
					let elemento = document.getElementById("num_cart")
					elemento.innerHTML = data.numero;
				}
			})
		}
	</script>
	

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