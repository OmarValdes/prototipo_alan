<?php  
session_start();
require 'conexion.php';  
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
            <a  class="nav-link active"></a>
          </li><li class="nav-item">
            <a  class="nav-link active"></a>
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
      </ul>
      </div>
  </div> 
	  	</div> 
	  	</nav>
	  	
	
	<h1 class="page-header text-center">Mis Productos</h1>

	<div class="row">
		<div class="col-sm-12">
			<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg></button>
            <div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>	
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Precio</th>
					<th>Descuento</th>
					<th>Activo</th>
					<th>Imagen</th>
					<th>Accion</th>
					
				</thead>
				<tbody id="tbody">
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- LLamamos a Modal -->
<?php include('modal.html'); ?>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/app.js"></script>
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