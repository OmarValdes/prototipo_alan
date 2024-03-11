<?php
 
	define("CLIENT_ID", "AemdrDEHcutwDR_GFmisoTaCScb0CNjJNXt3Zvp33fbV65Rg9580TKMrZi_YNyM2uulf3h2HqruJPowr");
	define("CURRENCY", "MXN");
	define("KEY_TOKEN", "APR.wqc-354*");
	define("MONEDA", "$");

	session_start();

	$num_cart = 0;
	if(isset($_SESSION['carrito']['productos'])) {
		$num_cart = count($_SESSION['carrito']['productos']);
	}

 ?>  