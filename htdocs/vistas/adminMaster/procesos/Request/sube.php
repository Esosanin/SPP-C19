<?php 
#header('Location: index.php');//esto es para subir la imagen y redirigir a index

$nombre=$id.'.jpg';//toma la imagen y su nombre
$guardado=$_FILES['imagen']['tmp_name'];

$query = "INSERT INTO IMAGE (idUsuario, type) VALUES ('$id', 'jpg')";
mysqli_query($con, $query);

if(!file_exists('../imageAdmin')){//comprueba que la carpeta archivos existe
	mkdir('../imageAdmin',0777,true);
	if(file_exists('../imageAdmin')){
		if(move_uploaded_file($guardado, '../imageAdmin/'.$nombre)){//guarda la imagen en archivos/
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}else{
	if(move_uploaded_file($guardado, '../imageAdmin/'.$nombre)){//lo mismo, guarda la imagen en archivos/
		echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar";
	}
}

?>
