<?php
	//Llamando los campos
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$comentario = $_POST['comentario'];

	$conexion=mysqli_connect("localhost","root","","tienda_online");

	$usuario=mysqli_real_escape_string($conexion,$usuario);
	$correo=mysqli_real_escape_string($conexion,$correo);
	$comentario=mysqli_real_escape_string($conexion,$comentario);

	$resultado=mysqli_query($conexion,'INSERT INTO comentarios (usuario,correo,comentario) VALUES ("'.$usuario.'","'.$correo.'","'.$comentario.'")');

		header('location:comentarios.php');

		
	?>