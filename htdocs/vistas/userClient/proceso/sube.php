<?php 
#header('Location: index.php');//esto es para subir la imagen y redirigir a index

$nameImage=substr($_FILES['imagen']['name'], 0,strpos($_FILES['imagen']['name'], '.')).".jpg";
$nameImageBefore = $nameImage;

$nombre=$id."_".$nameImage;//toma la imagen y su nombre
$guardado=$_FILES['imagen']['tmp_name'];

if($_FILES['imagen']['name']!=null){
    $query="SELECT * FROM IMAGE WHERE idUsuario='$id'";
    $res = mysqli_query($con, $query);
    $res = mysqli_fetch_array($res);
    if(empty($res['idUsuario'])){
        $query = "INSERT INTO IMAGE (idUsuario, name) VALUES ('$id', '$nameImage')";
        mysqli_query($con, $query);
    }else{
        $nameImageBefore = $res['idUsuario'].'_'.$res['name'];
        $query = "UPDATE IMAGE SET name='$nameImage' WHERE idUsuario='$id'";
        mysqli_query($con, $query);
    }

    if(!file_exists('../imageClient')){//comprueba que la carpeta archivos existe
	    mkdir('../imageClient',0777,true);
	    if(file_exists('../imageClient')){
            if(file_exists("../imageClient/".$nameImageBefore)){
                if(unlink("../imageClient/".$nameImageBefore)){
                    echo "Archivo eliminado con exito";
                }else{
                    echo "Archivo eliminado sin exito";
                }
            }
            if(move_uploaded_file($guardado, '../imageClient/'.$nombre)){//guarda la imagen en archivos/
			    echo "Archivo guardado con exito";
                $dato = $nombre;
		    }else{
		        echo "Archivo no se pudo guardar";
	        }
	    }
    }else{
	    if(file_exists("../imageClient/".$nameImageBefore)){
            if(unlink("../imageClient/".$nameImageBefore)){
                echo "Archivo eliminado con exito";
            }else{
                echo "Archivo eliminado sin exito";
            }
        }
        if(move_uploaded_file($guardado, '../imageClient/'.$nombre)){//guarda la imagen en archivos/
			echo "Archivo guardado con exito";
            $dato = $nombre;
		}else{
		    echo "Archivo no se pudo guardar";
	    }
    }
}
?>
