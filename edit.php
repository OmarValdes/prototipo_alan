 <?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$descuento = $_POST['descuento'];
		$activo = $_POST['activo'];

		$sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', descuento = '$descuento', activo = '$activo' WHERE id = '$id'";
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
			$output['message'] = 'Producto actualziado correctamente';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al actualizar. No se pudo actualizar';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();


	}
	

	//cerrar conexión
	$database->close();

	echo json_encode($output);
	
?>