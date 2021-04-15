<?php

include 'fecha.php';

$query = "UPDATE `PRODUCTO` SET `nombre`='".$_POST['name']."',`descripcion`='".$_POST['descripcion']."',`precio`='".$_POST['price']."',`cantidad`='".$_POST['cant']."',`gradoEscolaridad`='".$_POST['escolaridad']."' WHERE idAdmTienda='".$id."' AND idProducto='".$_POST['id']."'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}else{
    $id = $_POST['id'];
    include "sube_producto.php";
}

?>