<?php

include "fecha.php";
include "db.php";

$query_select = "SELECT idAdmTienda FROM PRODUCTO WHERE idProducto = '".$producto."'";
$res = mysqli_query($con, $query_select);
if (!$res){
    header("Location: operaciones/r_error.php");
    exit;
}
$resultado = mysqli_fetch_array($res);

$query_insert = "INSERT INTO `COMENTARIOS`(`idCliente`, `idTienda`, `idProducto`, `puntuacion`, `descripcion`, `fechaCreado`) VALUES ('".$cliente."', '".$resultado['0']."', '".$producto."', '".$calif."', '".$comentario."', '".$fecha."')";
$res = mysqli_query($con, $query_insert);
if (!$res){
    header("Location: operaciones/r_error.php");
    exit;
}

mysqli_close($con);
?>