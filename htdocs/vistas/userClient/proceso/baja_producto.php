<?php
include '../../db.php';
$id = $_GET['id'];
$idProd = $_GET['idProd'];
$idTienda = $_GET['idTienda'];

$query = "DELETE FROM `CARRITO` WHERE `idCliente`='".$id."' AND `idTienda`='".$idTienda."' AND `idProducto` ='".$idProd."';";
$res = mysqli_query($con, $query);

if(!$res){
    header('Location: ../r_error.php');
    exit;
}else{
    header('Location: ../r_congratulate.php');
    exit;
}
mysqli_close($con);
?>