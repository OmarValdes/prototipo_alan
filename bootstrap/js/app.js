$(document).ready(function(){
	fetch(); 
	//add
	$('#addnew').click(function(){
		$('#add').modal('show');
	});
	$('#formAdd').submit(function(e){
		e.preventDefault();
		var datos = new FormData($('#formAdd')[0]);
				//console.log(addform);
				$.ajax({
					method: 'POST',
					datatype: 'json',
					url: 'add.php',
					data: datos,
					contentType: false,
					processData: false,
					success: function(response){
						$('#add').modal('hide');
						if(response.error){
							$('#alert').show();
							$('#alert_message').html(response.message);
						}
						else{
							
							$('#nombre').val('');
							$('#descripcion').val('');
							$('#precio').val('');
							$('#descuento').val('');
							$('#activo').val('');
							fetch();
						}
						
					}
				});
	});
	//

	//edit
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		$('#edit').modal('show');
		// id(id);
		nombre(id);
		precio(id);
		descripcion(id);
		descuento(id);
		activo(id);
		$('.id').val(id);
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
		$.ajax({
			method: 'POST', 
			url: 'edit.php',
			data: editform,
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}

				$('#edit').modal('hide');
			}
		});
	});
	//

	//delete
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		// id(id);
		$('.id').val(id);
		$('#delete').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: 'delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
				
				$('#delete').modal('hide');
			}
		});
	});
	//

	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});

});

function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch.php',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}
function nombre(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_nombre.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.nombre').val(response.data.nombre);
			}
		}
	});
}
function descripcion(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_descripcion.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.descripcion').val(response.data.descripcion);
			}
		}
	});
}
function descuento(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_descuento.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.descuento').val(response.data.descuento);
			}
		}
	});
}
function precio(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_precio.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.precio').val(response.data.precio);
			}
		}
	});
}
function id_categoria(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_categoria.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.id_categoria').val(response.data.id_categoria);
			}
		}
	});
}
function activo(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row_activo.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.activo').val(response.data.activo);
			}
		}
	});
}