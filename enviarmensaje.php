<?php
	//Llamando los campos
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];

	$conexion=mysqli_connect("localhost","root","","tienda_online");

	$nombre=mysqli_real_escape_string($conexion,$nombre);
	$email=mysqli_real_escape_string($conexion,$email);
	$mensaje=mysqli_real_escape_string($conexion,$mensaje);

	$resultado=mysqli_query($conexion,'INSERT INTO contacto (nombre,email,mensaje) VALUES ("'.$nombre.'","'.$email.'","'.$mensaje.'")');

		header('location:contacto.php');

		
	?>