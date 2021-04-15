<?php

$query_pedidoCarrito = "UPDATE `PEDIDO` SET `estatus`='2' WHERE idCliente = '".$idC."' AND idPedido = '".$idP."' AND `idTienda` = '".$Tienda."'";
$resultado_query = mysqli_query($con, $query_pedidoCarrito);
if(!$resultado_query){
    header('Location: r_error.php');
    exit;
}

?>