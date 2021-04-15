<?php

$consulta = "SELECT * FROM PEDIDO, PEDIDOCARRITO WHERE PEDIDO.idCliente = PEDIDOCARRITO.idCliente AND PEDIDO.idTienda = PEDIDOCARRITO.idTienda AND PEDIDO.idPedido = '".$id."'";
$resultado = mysqli_query($con, $consulta);
if(!$resultado){
    header('Location: r_error.php');
    exit;
}
$respuesta = mysqli_fetch_array($resultado);

$query_pedidoCarrito = "DELETE FROM `PEDIDOCARRITO` WHERE `idCliente` = '".$respuesta['idCliente']."' AND `idTienda` = '".$respuesta['idTienda']."'";
$resultado_query = mysqli_query($con, $query_pedidoCarrito);
if(!$resultado_query){
    header('Location: r_error.php');
    exit;
}

$query = "DELETE FROM PEDIDO WHERE idPedido = '$id' AND `idCliente` = '".$respuesta['idCliente']."' AND `idTienda` = '".$respuesta['idTienda']."'";
$resultado_query = mysqli_query($con, $query);
if(!$resultado_query){
    header('Location: r_error.php');
    exit;
}


?>