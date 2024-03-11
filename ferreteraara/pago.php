<?php
	require 'config.php'; 
	require 'database.php';

	$db = new Database();
	$con = $db->conectar();

	$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

	//print_r($_SESSION);

	$lista_carrito = array();

	if ($productos != null){
		foreach ($productos as $clave => $cantidad) {

			$sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=?");
			$sql->execute([$clave]);
			$lista_carrito[] = $sql->

			fetch(PDO::FETCH_ASSOC);
		}
	} else{
		header('location:index.php');
		exit;
	}
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

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style type="text/css">
	main>.container{
		padding: 30px 0;
	}
	.oxxo
	{
		position: absolute;
		top: 50%;
		left: 20%;
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
<br><br>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h4>Detalles de pago</h4>
					<div id="paypal-button-container"></div>
				</div>
					
				 
				<div class="col-6">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Subtotal</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php if($lista_carrito == null){
							echo'<tr><td colspan="5" class="text-center"><b>Lista vacia</td></tr>';
						}
						else {
						$total = 0;
						foreach($lista_carrito as $producto){
							$_id = $producto['id'];
							$nombre = $producto['nombre'];
							$precio = $producto['precio'];
							$descuento = $producto['descuento'];
							$cantidad = $producto['cantidad'];
							$precio_desc = $precio - (($precio * $descuento) / 100);
							$subtotal = $cantidad * $precio_desc;
							$total += $subtotal;
						?>
						<tr>
							<td><?php echo $nombre; ?></td>
							<td>
								<div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format      ($subtotal, 2, '.', ','); ?></div>
							</td>
						</tr>
					    <?php }	?>
					    <tr>
					    	<td colspan="2">
					    	<p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p></td>
					    </tr>
				  </tbody>
      <?php }	?>
				</table>
			</div>
		</div>
	</div>
</div>
	</main>


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

	<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

	<script>
		paypal.Buttons({
			style: {
				color:'blue',
				shape:'pill',
				label:'pay'
			},
			createOrder: function(data, actions){
				return actions.order.create({
					purchase_units:[{
						amount: {
							value: <?php echo $total; ?>
						}
					}]
				});

			},

			onApprove: function(data, actions){
				let URL = 'captura.php'
				actions.order.capture().then(function (detalles){
					
					console.log(detalles)

					let url = 'captura.php' 

					return fetch(url, {
						method: 'post', 
						headers: {
							'content-type': 'application/json'
						},
						body: JSON.stringify({
							detalles: detalles
						})
					})
				});
			},
			
			onCancel: function(data){
				alert("Pago cancelado");
				console.log(data);
			}
		}).render('#paypal-button-container');
	</script>

</body>
</html>
 