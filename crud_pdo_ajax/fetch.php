 <?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM productos';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['id']; ?></td>
	    		<td><?php echo $row['nombre']; ?></td>
	    		<td><?php echo $row['descripcion']; ?></td>
	    		<td><?php echo $row['precio']; ?></td>
	    		<td><?php echo $row['descuento']; ?></td>
	    		<td><?php echo $row['activo']; ?></td>
	    		<?php 
	echo '<td>' . '<img src = "data:image/png;base64,' . base64_encode($row['imagen']) . '" width = "100px" height = "100px"/>'
      . '</td>';

		 ?>

	    		<td>
	<button class="btn btn-success btn-sm edit" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button>

	<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	    		</td>

		
	    	</tr>

	<?php 
	    }
	}

	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();


	?>