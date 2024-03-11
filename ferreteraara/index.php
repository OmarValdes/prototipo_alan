 <?php     
  require 'config.php';  
  require 'database.php'; 
  $db = new Database();
  $con = $db->conectar();

  $sql = $con->prepare("SELECT id, nombre, precio, imagen FROM productos WHERE activo=1");
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

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">



     <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<style type="text/css">
.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  

 
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

img.{
  width="500" 
  height="500"
}

.card{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2%;
    }

</style>

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



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last"><br><br>
                            <img class="img-fluid" src="./assets/img/car1.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Ferretera ARA</b><br> Saltillo</h1>
                                <h3 class="h2">En Ferretera ARA somos tu aliado confiable en soluciones para proyectos y necesidades de construcción.</h3>
                                <p>
                                  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/car2.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>¡La que vende vara!</b></h1>
                                <p>
                                    Nuestra pasión por la excelencia nos impulsa a ofrecerte una amplia gama de productos de calidad y servicios especializados para satisfacer tus requerimientos. Desde herramientas hasta materiales de construcción, nuestro compromiso es proporcionarte productos confiables y duraderos que impulsen el éxito de tus proyectos. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/car3.jpg" alt="" width="400" height="400">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Visítanos</b></h1>
                                <p>
                                    nuestra atención personalizada y equipo experto están siempre a tu disposición para asesorarte y brindarte la mejor experiencia de compra. En Ferretera ARA, nos enorgullecemos de ser tu socio confiable en cada paso de tu trayectoria constructiva.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorías de nuestros productos</h1>
                
            </div>
        </div>
</section>
<div class="main">
 <!--cards -->
<div class="card">
<div class="image">
   <img src="images/categorias/tornilleria.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Tornillería </p>
<a class="btn btn-primary" href="tornillos.php" role="button" id="descargar">Ver</a>
</div>
</div>

<div class="card">

<div class="image">
   <img src="images/categorias/pinturas.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Pinturas y solventes</p>
<a class="btn btn-primary" href="pinturasysolventes.php" role="button" id="descargar">Ver</a>
</div>
</div>

<div class="card">
<div class="image">
   <img src="images/categorias/herramientas.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Herramientas en general</p>
<a class="btn btn-primary" href="herramientasengeneral.php" role="button" id="descargar">Ver</a>
</div>
</div>
<!--cards -->


<div class="card">
<div class="image">
   <img src="images/categorias/herrajes.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Herrajes</p>
<a class="btn btn-primary" href="herrajes.php" role="button" id="descargar">Ver</a>
</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="images/categorias/electrico.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Material eléctrico</p>
<a class="btn btn-primary" href="materialelectrico.php" role="button" id="descargar">Ver</a>
</div>
</div>
<!--cards -->

<div class="card">
<div class="image">
   <img src="images/categorias/plomeria.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Plomería</p>
<a class="btn btn-primary" href="plomeria.php" role="button" id="descargar">Ver</a>
</div>
</div>
<!--cards -->

<div class="card">
<div class="image">
   <img src="images/categorias/electrica.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Herramienta eléctrica</p>
<a class="btn btn-primary" href="herramientaelectrica.php" role="button" id="descargar">Ver</a>
</div>
</div>
<!--cards -->
<div class="card">

<div class="image">
   <img src="images/categorias/cerrajeria.jpg" width="200" height="200">
</div>
<div class="title">
</div>
<div class="des">
 <p>Cerrajería</p>
<a class="btn btn-primary" href="cerrajeria.php" role="button" id="descargar">Ver</a>
</div>
</div>
</div>
<br>

    <!-- End Categories of The Month -->


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
                        </li>
                    </ul>
                </div>

            </div></center>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div><center>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/ferreteraara"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</center>
<center>
        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            © 2023 Derechos Reservados Ferretera ARA
                        </p>
                    </div>
                </div>
            </div>
        </div>
</center>
    </footer>
    <!-- End Footer -->

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
</body>

</html>

