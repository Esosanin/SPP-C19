<?php
include 'db.php';

$query_select = "SELECT * FROM CARRITO WHERE idCliente = '$idCliente' AND idProducto = '$idProd' AND idTienda = '$idAdm'";
$result = mysqli_query($con, $query_select);
$result = mysqli_fetch_array($result);

if(empty($result['idProducto'])){
    $precio_total = $cant * $precio;
    $query = "INSERT INTO `CARRITO`(`idCliente`, `idTienda`, `idProducto`, `cantidad`, `precio`) VALUES ('".$idCliente."', '".$idAdm."', '".$idProd."', '".$cant."', '".$precio_total."')";
    $res = mysqli_query($con, $query);
    if(!$res){
        header("Location: userClient/r_error.php");
        exit;
    }else{
        header("Location: userClient/r_congratulate.php");
        exit;
    }
}else{

    $query = "SELECT cantidad FROM PRODUCTO WHERE idProducto = '".$idProd."' AND idAdmTienda = '".$idAdm."'";
    $resultUp = mysqli_query($con, $query);
    if (!$resultUp){
        header("Location: userClient/r_error.php");
        exit;
    }
    $resultUp = mysqli_fetch_array($resultUp);

    $cant = $cant + $result['cantidad'];

    if ($cant > $resultUp[0]){
        $cant = $resultUp[0];
    }
    $precio_total = $cant * $precio;
    $query_update = "UPDATE `CARRITO` SET `cantidad`='".$cant."',`precio`='".$precio_total."' WHERE idCliente = '".$idCliente."' AND idProducto = '".$idProd."' AND idTienda = '".$idAdm."'";
    $result = mysqli_query($con, $query_update);
    if(!$result){
        header("Location: userClient/r_error.php");
        exit;
    }else{
        header("Location: userClient/r_congratulate.php");
        exit;
    }
}

mysqli_close($con);

?>