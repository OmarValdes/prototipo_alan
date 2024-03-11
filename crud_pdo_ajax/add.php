<?php  
	include_once('conexion.php');

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$descuento = $_POST['descuento'];
	$activo = $_POST['activo'];
	$size = getimagesize($_FILES["imagen"]["tmp_name"]);
	if($size !== false){
		$cargarImagen = $_FILES['imagen']['tmp_name'];
		$imagen = fopen($cargarImagen,'rb');
	}

		$stmt = $cnnPDO->prepare("INSERT INTO productos (nombre, descripcion, precio, descuento, activo, imagen) VALUES (:nombre, :descripcion, :precio, :descuento, :activo, :imagen)");
		$stmt -> bindParam(':nombre',$nombre);
		$stmt -> bindParam(':descripcion',$descripcion);
		$stmt -> bindParam(':precio',$precio);
		$stmt -> bindParam(':descuento',$descuento);
		$stmt -> bindParam(':activo',$activo);
		$stmt -> bindParam(':imagen',$imagen, PDO::PARAM_LOB);

		echo $stmt -> execute();
		   
?>