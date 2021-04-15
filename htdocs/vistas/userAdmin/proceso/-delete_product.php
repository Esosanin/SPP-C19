<?php

$query = "DELETE FROM PRODUCTO WHERE idProducto = '".$_POST['id']."' AND idAdmTienda='".$id."'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}else{
    $query = "SELECT * FROM IMAGEPRODUCTO WHERE idProducto = '".$_POST['id']."'";
    $res = mysqli_query($con, $query);
    $res = mysqli_fetch_array($res);
    if (!$res){
    }else{
        $query = "DELETE FROM IMAGEPRODUCTO WHERE idProducto = '".$_POST['id']."'";
        $resultado=mysqli_query($con, $query);
        if(!$resultado){
            header("Location: r_error.php");
            exit;
        }else{
            unlink("../imageShop/".$res['idProducto']."_".$res['name']);
        }
    }
}
?>