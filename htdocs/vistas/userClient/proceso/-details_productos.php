<?php

$query = "SELECT DISTINCT PEDIDOCARRITO.*, PRODUCTO.nombre FROM PEDIDO, PEDIDOCARRITO, PRODUCTO WHERE PEDIDO.idCliente = PEDIDOCARRITO.idCliente AND PRODUCTO.idProducto = PEDIDOCARRITO.idProducto AND PRODUCTO.idAdmTienda = PEDIDOCARRITO.idTienda AND PEDIDOCARRITO.idCliente = '$idCliente' AND PEDIDOCARRITO.idProducto = '$id'";
$result = mysqli_query($con, $query);

$array;
$array_request;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$array_request = array("idProducto" => $row['idProducto'],"nombre" => $row['nombre'], "cant" => $row['cantidad'], "price" => $row['precio']);
$array[$row['idProducto']] = $array_request;

?>
                <tr align="center">
                    <td><?php echo $array[$row['idProducto']]["idProducto"];?></td>
                    <td align="center"><?php echo $array[$row['idProducto']]["nombre"];?></td>
                    <td align="center"><?php echo $array[$row['idProducto']]["cant"];?></td>
                    <td align="center"><?php echo $array[$row['idProducto']]["price"];?></td>
                </tr>

<?php
}


mysqli_close($con);

?>