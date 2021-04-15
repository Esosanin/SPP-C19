<?php
include "../db.php";
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

$id = $_SESSION['id'];

$query = "SELECT idCliente FROM CLIENTE WHERE idUsuario = '$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$res = mysqli_fetch_array($res);
$idCliente = $res[0];

$query = "DELETE FROM CARRITO WHERE idCliente = '$idCliente'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM COMENTARIOS WHERE idCliente = '$idCliente'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM PEDIDO WHERE idCliente = '$idCliente'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM SUSPENSION WHERE idUsuario = '$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM USUARIO WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM DIRECCION WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM CLIENTE WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
$query = "DELETE FROM IMAGE WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}

mysqli_close($con);

include '-sesion_off.php';

?>