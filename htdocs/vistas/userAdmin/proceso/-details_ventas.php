<?php
$query = "SELECT DISTINCT * FROM FACTURA WHERE idTienda = '$idTienda' ORDER BY idFactura";
$result = mysqli_query($con, $query);

$array;
$array_request;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$array_request = array("idFactura" => $row['idFactura'], "idCliente" => $row['idCliente'], "idTienda" => $row['idTienda'], "idProducto" => $row['idProducto'], "cant" => $row['cantidad'], "price" => $row['precio'], "fecha" => $row['fechaFactura']);
$array[$row['idFactura']] = $array_request;

?>
                <tr align="center">
                    <td><?php echo $array[$row['idFactura']]["idFactura"];?></td>
                    <td align="center"><?php echo $array[$row['idFactura']]["idCliente"];?></td>
                    <td align="center"><?php echo $array[$row['idFactura']]["idProducto"];?></td>
                    <td align="center"><?php echo $array[$row['idFactura']]["cant"];?></td>
                    <td align="center"><?php echo $array[$row['idFactura']]["price"];?></td>
                    <td align="center"><?php echo $array[$row['idFactura']]["fecha"];?></td>
                    <td align="center">
                        <?php echo "<a href=\"#baja_" . $array[$row['idFactura']]["idFactura"] . "\" class=\"btn btn-info btn-sm btn-danger\" data-toggle=\"modal\">Eliminar</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idFactura']]["idFactura"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="baja">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Eliminar Pedido</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="center">
                                                    <td>¿Estas seguro de eliminar el pedido con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idFactura']]['idFactura'];?>"></label></strong></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                                    </td>
                                                    <td align="right">
                                                        <button type="submit" name="baja" class="btn btn-success">Continuar</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

<?php
}


mysqli_close($con);

?>