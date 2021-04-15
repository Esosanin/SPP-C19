<?php
include 'fecha.php';

$query = "INSERT INTO `PRODUCTO`(`idAdmTienda`,`nombre`, `descripcion`, `precio`, `cantidad`, `gradoEscolaridad`, `fechaRegistro`) VALUES ('".$id."','".$_POST['name']."','".$_POST['description']."','".$_POST['price']."','".$_POST['cant']."','".$_POST['escolaridad']."', '".$fecha."')";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}else{
    $query ="SELECT idProducto FROM PRODUCTO WHERE idAdmTienda = '".$id."' AND nombre = '".$_POST['name']."'";
    $res = mysqli_query($con, $query);
    $res = mysqli_fetch_array($res);
    $id = $res['idProducto'];
    include "sube_producto.php";
}
?>