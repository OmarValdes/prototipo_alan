<?php  
	require 'config.php';
	require 'database.php';
	$db = new Database();
	$con = $db->conectar();

	$id = isset($_GET['id']) ? $_GET['id'] :'';
	$token = isset($_GET['token']) ? $_GET['token'] : '';

	if($id == '' || $token == ''){
		echo 'Error al procesar la petición';
		exit;
	} else {
		$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

		if ($token == $token_tmp) {

				$sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? ");
				$sql->execute([$id]);
				if($sql->fetchColumn() > 0){

					$sql = $con->prepare("SELECT nombre, descripcion, precio, descuento, imagen FROM productos WHERE id=? ");
					$sql->execute([$id]);
					$row = $sql->fetch(PDO::FETCH_ASSOC);
					$nombre = $row['nombre'];
					$descripcion = $row['descripcion'];
					$precio = $row['precio'];
					$descuento = $row['descuento'];
					$precio_desc = $precio - (($precio * $descuento) / 100); 
					$imagen = $row['imagen'];

          }
          
        }
      }

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda online</title>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">



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
                            <a class="nav-link" href="about.html">Comentarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">¿Quiénes somos?</a>
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

	<main>
		<div class="container">
			<div class="row">
				<div class="col-md-6 order-md-1">


					<div id="carouselimages" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="data:imagen/png;base64, <?php echo base64_encode($row['imagen']);?>" class="producto" class="d-block w-100">
    </div>

    </div>
</div>

					

					<style type="text/css">
						.producto{
							width: 450px;
              padding: 20px;
						}
					</style>
				</div>
				<div class="col-md-6 order-md-2">
					<h2><?php echo $nombre ?></h2>

					<?php if($descuento > 0) { ?>
						<p><del><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></del></p>

						<h2><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
							<small class="text-succes"><?php echo $descuento; ?> %descuento </small>
						</h2>

					<?php }else{ ?> 

					<h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>

				<?php } ?>

					<p class="lead">
						<?php echo $descripcion; ?> 
					</p>
					<div class="d-grid gap-3 col-10 mx-auto">
						<button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
					</div>
			  </div>
		  </div>
	 </div>
			
 </main>
 <script src="js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	<script>
		function addProducto(id, token){
			let url = 'carrito.php'
			let formData = new FormData()
			formData.append('id', id)
			formData.append('token', token) 

			fetch(url, {
				method: 'POST',
				body: formData,
				mode: 'cors'
			}).then(response => response.json())
			.then(data => {
				if(data.ok){
					let elemento = document.getElementById("num_cart")
					elemento.innerHTML = data.numero
				}
			})
		}
	</script>

</body>
</html>
<script type="text/javascript">
$( "#close" ).click(function(){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: '¿Esta seguro?',
        text: "¿Desea cerrar su cuenta?",
        icon: 'Cerrar secion',
        showCancelButton: true,
        confirmButtonText: '<a href="logout.php" class="text-light" style="text-decoration: none; ">Cerrarla</a>',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'Sigue disfrutando de nuestros productos'
            )
        }
        })
            return false;
      });
</script>