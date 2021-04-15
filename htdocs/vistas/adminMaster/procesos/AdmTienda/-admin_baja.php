<?php
$query = "SELECT idAdmTienda FROM ADMTIENDA WHERE idUsuario = '$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
$res = mysqli_fetch_array($res);
$idTienda = $res[0];

$query = "DELETE FROM SUSPENSION WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}

$query = "DELETE FROM COMENTARIOS WHERE idTienda='$idTienda'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}

$query = "SELECT idProducto FROM PRODUCTO WHERE idAdmTienda = '$idTienda'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
while ($row=mysqli_fetch_array($res)){
    $query = "DELETE FROM IMAGEPRODUCTO WHERE idProducto='".$row[0]."'";
    $res = mysqli_query($con, $query);
    if(!$res){
        header("Location: procesos/r_error.php");
        exit;
    }
    $query = "DELETE FROM CARRITO WHERE idProducto='".$row[0]."' AND idTienda = '$idTienda'";
    $res = mysqli_query($con, $query);
    if(!$res){
        header("Location: procesos/r_error.php");
        exit;
    }
}

$query = "DELETE FROM PRODUCTO WHERE idAdmTienda='$idTienda'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}

$query = "DELETE FROM USUARIO WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
$query = "DELETE FROM DIRECCION WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
$query = "DELETE FROM ADMTIENDA WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
$query = "DELETE FROM IMAGE WHERE idUsuario='$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}
?>