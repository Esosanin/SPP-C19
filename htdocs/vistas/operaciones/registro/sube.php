<?php 
#header('Location: index.php');//esto es para subir la imagen y redirigir a index

$nameImage=substr($_FILES['imagen']['name'], 0,strpos($_FILES['imagen']['name'], '.')).".jpg";

$nombre=$id.'_'.$nameImage;//toma la imagen y su nombre
$guardado=$_FILES['imagen']['tmp_name'];

$query = "INSERT INTO IMAGE (idUsuario, name) VALUES ('$id', '$nameImage')";
mysqli_query($con, $query);

if(!file_exists('../imageClient')){//comprueba que la carpeta archivos existe
	mkdir('../imageClient',0777,true);
	if(file_exists('../imageClient')){
		if(move_uploaded_file($guardado, '../imageClient/'.$nombre)){//guarda la imagen en archivos/
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}else{
	if(move_uploaded_file($guardado, '../imageClient/'.$nombre)){//lo mismo, guarda la imagen en archivos/
		echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar";
	}
}

?>
