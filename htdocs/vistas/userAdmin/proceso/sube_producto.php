<?php 
#header('Location: index.php');//esto es para subir la imagen y redirigir a index

$nameImage=substr($_FILES['imagen']['name'], 0,strpos($_FILES['imagen']['name'], '.')).".jpg";
$nameImageBefore = $nameImage;

$nombre=$id."_".$nameImage;//toma la imagen y su nombre
$guardado=$_FILES['imagen']['tmp_name'];

if($_FILES['imagen']['name']!=null){
    $query="SELECT * FROM IMAGEPRODUCTO WHERE idProducto='$id'";
    $res = mysqli_query($con, $query);
    $res = mysqli_fetch_array($res);
    if(empty($res['idProducto'])){
        $query = "INSERT INTO IMAGEPRODUCTO (idProducto, name) VALUES ('$id', '$nameImage')";
        mysqli_query($con, $query);
    }else{
        $nameImageBefore = $res['idProducto'].'_'.$res['name'];
        $query = "UPDATE IMAGEPRODUCTO SET name='$nameImage' WHERE idProducto='$id'";
        mysqli_query($con, $query);
    }

    if(!file_exists('../imageShop')){//comprueba que la carpeta archivos existe
	    mkdir('../imageShop',0777,true);
	    if(file_exists('../imageShop')){
            if(file_exists("../imageShop/".$nameImageBefore)){
                unlink("../imageShop/".$nameImageBefore);
            }
            move_uploaded_file($guardado, '../imageShop/'.$nombre);//guarda la imagen en archivos/
	    }
    }else{
	    if(file_exists("../imageShop/".$nameImageBefore)){
            unlink("../imageShop/".$nameImageBefore);
        }
        move_uploaded_file($guardado, '../imageShop/'.$nombre);//guarda la imagen en archivos/
    }
}

?>
