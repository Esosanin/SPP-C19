<?php

include 'db.php';

$calificacion = 0;
$i = 0;
$array = null;
$array_com = null;

$idProducto = null;
$nombre_producto = null;
$descripcion_producto = null;
$g_escolaridad_producto = null;
$precio_producto = null;
$cantidad = null;

$id_tienda = null;
$nombre_tienda = null;

$d_imagen_producto="imageShop/producto.jpg";

$query_info_producto = "SELECT PRODUCTO.nombre, PRODUCTO.descripcion, PRODUCTO.gradoEscolaridad, PRODUCTO.precio, PRODUCTO.idAdmTienda, PRODUCTO.idProducto, IMAGEPRODUCTO.name, PRODUCTO.cantidad FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.idProducto=".$_GET['id'];
$res = mysqli_query($con, $query_info_producto);
if(!$res){
    header("Location: operaciones/r_error.php");
    exit;
}else{

    $fila_producto = mysqli_fetch_array($res);

    $query_comentario = "SELECT * FROM COMENTARIOS WHERE idProducto = '".$fila_producto['idProducto']."'";
    $resultado = mysqli_query($con, $query_comentario);
    if(!$resultado){
        header("Location: operaciones/r_error.php");
        exit;
    }else{
        while($row=mysqli_fetch_array($resultado)){
            $i = $i + 1;
            $array_com = array("comentario" => $row['idComentario'], "cliente" => $row['idCliente'], "tienda" => $row['idTienda'], "producto" => $row['idProducto'], "puntos" => $row['puntuacion'], "desc" => $row['descripcion'], "fecha" => $row['fechaCreado']);
            $array[$i] = $array_com;
            
            $calificacion = $calificacion + $array[$i]['puntos'];
        }

        $calificacion = $calificacion / $i;
    }

    //dirección de la imagen del producto
    if ($fila_producto['6'] != null){
        $d_imagen_producto="imageShop/".$fila_producto['5'].'_'.$fila_producto['6'];
    }
    //pido la info del producto
    $nombre_producto = $fila_producto['0'];
    $descripcion_producto = $fila_producto['1'];
    $precio_producto = $fila_producto['3'];
    $cantidad = $fila_producto['7'];
    $idProducto = $fila_producto['5'];


    //el espacio 4 del arreglo es el id de la tienda a la cual pertenece el producto
    $id_tienda=$fila_producto['4'];
    $query_info_tienda = "SELECT nombreTienda FROM `ADMTIENDA` WHERE idAdmTienda = $id_tienda";
    $info_tienda=mysqli_query($con,$query_info_tienda);
    $fila_tienda=mysqli_fetch_array($info_tienda);

    $nombre_tienda=$fila_tienda['0'];//ya que solo es el dato de nombre, es en la casilla 0


    //ahora aignaré el grado de escolaridad
    switch ($fila_producto['2']) {
        case 0:
            $g_escolaridad_producto= "General";
            break;
        case 1:
            $g_escolaridad_producto ="Primaria";
            break;
        case 2:
            $g_escolaridad_producto ="Secundaria";
            break;
        case 3:
            $g_escolaridad_producto ="Preparatoria";
            break;
        case 4:
            $g_escolaridad_producto ="Universidad";
            break;
    }
}

mysqli_close($con);

?>
