<?php

$consulta = "SELECT * FROM PEDIDO, PEDIDOCARRITO WHERE PEDIDO.idCliente = PEDIDOCARRITO.idCliente AND PEDIDO.idTienda = PEDIDOCARRITO.idTienda AND PEDIDO.idPedido = '".$id."' AND PEDIDO.idCliente = '".$cliente."'";
$resultado = mysqli_query($con, $consulta);
if(!$resultado){
    header('Location: r_error.php');
    exit;
}
$respuesta = mysqli_fetch_array($resultado);

if ($estado == 3 || $estado == 4){
    include "proceso/fecha.php";
    $query_create = "INSERT INTO `FACTURA`(`idCliente`, `idTienda`, `idProducto`, `cantidad`, `precio`, `fechaFactura`) VALUES ('".$cliente."', '".$respuesta['idTienda']."', '".$respuesta['idProducto']."', '".$respuesta['cantidad']."', '".$respuesta['precio']."', '".$fecha."')";
    $resultado_query = mysqli_query($con, $query_create);
    if(!$resultado_query){
        header('Location: r_error.php');
        exit;
    }
    $id = $respuesta['idPedido'];
    include "-delete_pedido.php";
}else{
    $query_pedidoCarrito = "UPDATE `PEDIDO` SET `estatus`='".$estado."' WHERE idPedido = '".$id."' AND `idCliente` = '".$cliente."' AND `idTienda` = '".$respuesta['idTienda']."'";
    $resultado_query = mysqli_query($con, $query_pedidoCarrito);
    if(!$resultado_query){
        header('Location: r_error.php');
        exit;
    }
}
?>