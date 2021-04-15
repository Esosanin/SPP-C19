<?php
//aquí la conexión a la bd
include 'db.php';

$id_tienda=$_GET['id'];
$nombre_tienda;
$descripcion_tienda;

$query = "SELECT PRODUCTO.idProducto, PRODUCTO.nombre, PRODUCTO.descripcion, PRODUCTO.precio, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE idAdmTienda = $id_tienda";
$info_productos = mysqli_query($con, $query);

//aquí va la dirección de la carpeta de las imagenes
$d_imagen_tienda="imageAdmin/";

//aquí solo haré referencia a la dirección de la carpeta de las imagenes de los productos
$d_imagen_producto = "imageShop/";

//aquí solo le pido el nombre y la descripción
$query_info_tienda = "SELECT nombreTienda, descripcion, idUsuario FROM `ADMTIENDA` WHERE idAdmTienda = $id_tienda";
$info_tienda=mysqli_query($con,$query_info_tienda);
$fila_tienda=mysqli_fetch_array($info_tienda);

//aquí obtenemos la imagen de la tienda
$query = "SELECT IMAGE.name FROM ADMTIENDA, IMAGE, USUARIO WHERE ADMTIENDA.idUsuario = USUARIO.idUsuario AND USUARIO.idUsuario = IMAGE.idUsuario AND ADMTIENDA.idAdmTienda = $id_tienda";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

//aquí pido el id, nombre, descripción y el precio de los productos
#$query_productos="SELECT idProducto, nombre, descripcion, precio FROM producto WHERE idAdmTienda = $id_tienda";
#$info_productos=mysqli_query($conn,$query_productos);


$nombre_tienda = $fila_tienda[0];
$descripcion_tienda = $fila_tienda[1];
$idUsuario = $fila_tienda[2];
$imageAdm = $row[0];

$calificacion = 0;
$i = 0;

$query = "SELECT puntuacion FROM COMENTARIOS WHERE idTienda = $id_tienda";
$res = mysqli_query($con, $query);
while($row = mysqli_fetch_array($res)){
    $calificacion += $row[0];
    $i+=1;
}
$calificacion = $calificacion/$i;

mysqli_close($con);


?>