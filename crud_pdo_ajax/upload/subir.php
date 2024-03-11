<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagos</title>
</head>
<body>

<h1>Método de Pago</h1>
<h3>Los datos sobre los numeros de cuenta son dados por nuestro contacto de WhatsApp.</h3>
<a target="_blank"><img src="Imagenes/pay.png" width="500px" height="80px"></a><br>
<style>
    *
    {
        text-align: center;
    }
    body
    {
      background-image: url(imagenes/);
      
      background-repeat: no-repeat;
      background-size: 1300px;
    }
</style>
<?php
include 'config.php';
if (isset($_POST['submit'])) {   
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
     
     
      // creamos las variables para subir a la db
        $ruta = "upload/"; 
        $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        $upload= $ruta.$nombrefinal;  



        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
                    
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: <i><a href=\"".$ruta.$nombrefinal."\">".$_FILES['fichero']['name']."</a></i><br>";  
                    echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";
                    echo "<br><hr><br>";  
                         


                   $nombre  = $_POST["nombre"]; 
                   $description  = $_POST["description"]; 


                   $query = "INSERT INTO gestion (id,name,description,ruta,tipo,size,) 
    VALUES ('$nombre','$description')".$nombrefinal."','".$_FILES['fichero']['type']."','".$_FILES['fichero']['size'];

       $query or die(mysql_error()); 
       echo "El archivo '".$nombre."se ha subido con éxito <br>";       
        }  
    }  
 } 
?> 

<body> 
    <h1>Subir Ficha de pago</h1>
    <h4>Ya hecho tu pago debes subir el ticket (o captura en caso de Transferencia) Escribiendo en Descripcion.</h4>
    <h4>*Codigo de Producto.<br>
    *Nombre Completo Cliente.</h4>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"><br>
    <input name="fichero" type="file" size="150" maxlength="150"><br> 
    <br>
        <td>Nombre</td><td><input type="text" name="nombre" placeholder="Nombre's " required="required"></td>
    <br>

    <br> Descripcion: <input name="description" type="text" size="50" maxlength="300"><br>
    
  <br><input name="submit" type="submit" value="SUBIR">
</form> 
    <a href="" target="_blank"><img src="imagenes/was.png" width="100" height="100"></a>
    <h3>Mandanos WhatsApp para tu guia de envio</h3>
</body>
</html>