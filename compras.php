<?php 
session_start();
require 'conexion.php';

  $sql ='SELECT * FROM compra';
  $stmt = $cnnPDO->prepare($sql);
  $stmt->execute();
  
?>


<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8">
	<title>CRUD</title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
</head>
<body> 
<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	  	<div class="collapse navbar-collapse" id="navbarColor02">
		    <h1 class="text-white">Bienvenido administrador Ferretera ARA</h1>
		    <div class="collapse navbar-collapse" id="navbarHeader">
      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
      		  <li class="nav-item">
            <a class="nav-link active"></a>
          </li><li class="nav-item">
            <a class="nav-link active"></a>
          </li>
           </li>
<li class="nav-item">
            <a class="nav-link active">User: <?php echo $_SESSION['email']; ?></a>
          </li>
          <li class="nav-item">
                <a href="indexadmi.php" class="nav-link" > Home </a>
          </li>
          <li class="nav-item">
                <a href="compras.php" class="nav-link" > Compras </a>
          </li>
          <li class="nav-item">
                <a href="mensajes.php" class="nav-link" > Mensajes </a>
          </li>
          <li class="nav-item">
                <a href="#" class="nav-link" name="close" id="close"> Cerrar mi cuenta </a>
          </li>
      </div>
  </div> 
	  	</div> 
	  	</nav>
	  	
	
	<h1 class="page-header text-center">Informacion del comprador</h1>
	<div class="row">
		<div class="col-sm-12">
			
            <div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>	
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID de compra</th>
					<th>ID de transaccion</th>
					<th>fecha de compra</th>
					<th>Estatus</th>
					<th>correo de cliente</th>
					<th>id cliente</th>
					<th>total</th>

				</thead>
				<tbody id="tbody">
					
				</tbody>
				<?php
  while ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<tr>';
      echo '<td>' . $campo['id'] . '</td>';
      echo '<td>' . $campo['id_transaccion']. '</td>';  
      echo '<td>' . $campo['fecha'] . '</td>';
     echo '<td>' . $campo['status'] . '</td>';
      echo '<td>' . $campo['email'] . '</td>';  
      echo '<td>' . $campo['id_cliente'] . '</td>';
      echo '<td>' . $campo['total'] . '</td>';
      echo '</tr>';
  }
  ?>
			</table>
		</div>
	</div>
</div>
<!-- LLamamos a Modal -->

<?php
$sql ='SELECT * FROM detalle_compra';
  $stmt = $cnnPDO->prepare($sql);
  $stmt->execute();
{
 ?>

<h1 class="page-header text-center"> Informacion de la compra</h1>
	<div class="row">
		<div class="col-sm-12">
			
            <div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>	
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					
					<th>ID de compra</th>
					<th>ID de producto</th>
					<th>nombre de producto</th>
					<th>precio de producto</th>
					<th>cantidad de producto</th>
					

				</thead>
				<tbody id="tbody">
					
				</tbody>
				<?php
  while ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<tr>';
      echo '<td>' . $campo['id_compra']. '</td>';  
      echo '<td>' . $campo['id_producto'] . '</td>';
     echo '<td>' . $campo['nombre'] . '</td>';
      echo '<td>' . $campo['precio'] . '</td>';  
      echo '<td>' . $campo['cantidad'] . '</td>';
      echo '</tr>';
  }
  ?>
<?php } ?>
			</table>
		</div>
	</div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
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