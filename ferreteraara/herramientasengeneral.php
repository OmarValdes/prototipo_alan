<?php     
    require 'config.php';  
    require 'database.php'; 
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id, nombre, precio, imagen FROM productos WHERE activo=3");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    //session_destroy();
 
    //print_r($_SESSION);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ferretera ARA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />


    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />


    <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop



https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Header -->
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
                            <a class="nav-link" href="quienes.php">¿Quiénes somos?</a>
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
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

<br><br><br>

    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <?php foreach($resultado as $row) { ?>
        <div class="col">
          <div class="card shadow-sm">

            <?php 
            $id = $row['id'];
            ?><br>

            <center><img class="center" width = "250px" height = "200px" src="data:imagen/png;base64, <?php echo base64_encode($row['imagen']);?>"></center>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre'];?></h5>
              <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', ',');?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1',$row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                </div>
                <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN);?>')">Agregar al carrito</button>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
  </main> 

<br><br><br>

    
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
    <!-- End Footer -->

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

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

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