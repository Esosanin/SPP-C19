<?php
$query = "SELECT DISTINCT PEDIDO.*, ADMTIENDA.nombreTienda, PEDIDOCARRITO.idProducto FROM PEDIDO, PEDIDOCARRITO, ADMTIENDA WHERE ADMTIENDA.idAdmTienda = PEDIDO.idTienda AND PEDIDO.idCliente = PEDIDOCARRITO.idCliente AND PEDIDO.idTienda = PEDIDOCARRITO.idTienda AND (PEDIDO.estatus = 2 OR PEDIDO.estatus = 5) AND PEDIDOCARRITO.idCliente = '$idCliente'";
$result = mysqli_query($con, $query);

$array;
$array_request;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$array_request = array("idPedido" => $row['idPedido'], "nombreT" => $row['nombreTienda'], "idProducto" => $row['idProducto'], "cant" => $row['cantidad'], "price" => $row['precio'], "estatus" => $row['estatus'], "fecha" => $row['fechaRegistro'], "calle" => $row['calle'], "col" => $row['colonia'], "numero" => $row['numeroEdificio'], "cp" => $row['codigoPostal']);
$array[$row['idPedido']] = $array_request;

?>
                <tr align="center">
                    <td><?php echo $array[$row['idPedido']]["idPedido"];?></td>
                    <td align="center"><?php echo $array[$row['idPedido']]["nombreT"];?></td>
                    <td align="center"><?php echo $array[$row['idPedido']]["price"];?></td>
                    <td align="center">
                    <?php 
                    $Estado = null;
                    switch($array[$row['idPedido']]["estatus"]){
                        case 1:
                            $Estado = "Espera de confirmación";
                        break;
                        case 2:
                            $Estado = "En camino";
                        break;
                        case 3:
                            $Estado = "Entregado";
                        break;
                        case 4:
                            $Estado = "Cancelado";
                        break;
                        case 5:
                            $Estado = "Recoger";
                        break;
                    }
                    echo $Estado;
                    ?></td>
                    <td align="center"><?php echo $array[$row['idPedido']]["fecha"];?></td>
                    <td align="center">
                        <?php echo "<a href=\"#Details_" . $array[$row['idPedido']]["idPedido"] . "\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\">Detalles...</a>"; ?>
                        <!--Ventana emergente Detalles-->
                        <?php echo "<div id=\"Details_" . $array[$row['idPedido']]["idPedido"] . "\" class=\"modal fade\" role=\"dialog\">";?>
                            <div class="modal-dialog modal-md modal-dialog-centered">

                            <!-- Contenido del Modal -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!--Header-->
                                        <h4 class="modal-title">Detalles del producto</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <tr align="center">
                                                <td>ID: <?php echo $array[$row['idPedido']]["idPedido"]; ?></td>
                                                <td></td>
                                                <td>ID Cliente: <?php echo $array[$row['idPedido']]["nombreT"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Cantidad: <?php echo $array[$row['idPedido']]["cant"]; ?></td>
                                                <td></td>
                                                <td>Precio: $<?php echo $array[$row['idPedido']]["price"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Estado: 
                                                <?php 
                                                $Estado = null;
                                                switch($array[$row['idPedido']]["estatus"]){
                                                    case 1:
                                                        $Estado = "Espera de confirmación";
                                                    break;
                                                    case 2:
                                                        $Estado = "En camino";
                                                    break;
                                                    case 3:
                                                        $Estado = "Entregado";
                                                    break;
                                                    case 4:
                                                        $Estado = "Cancelado";
                                                    break;
                                                    case 5:
                                                        $Estado = "Recoger";
                                                    break;
                                                }
                                                echo $Estado;
                                                ?></td>
                                                <td></td>
                                                <td>Fecha Registro: <?php echo $array[$row['idPedido']]["fecha"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Calle: <?php echo $array[$row['idPedido']]["calle"]; ?></td>
                                                <td></td>
                                                <td>Colonia: <?php echo $array[$row['idPedido']]["col"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Numero Exterior: #<?php echo $array[$row['idPedido']]["numero"]; ?></td>
                                                <td></td>
                                                <td>CP: <?php echo $array[$row['idPedido']]["cp"]; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo "<a href=\"#baja_" . $array[$row['idPedido']]["idPedido"] . "\" class=\"btn btn-info btn-sm btn-danger\" data-toggle=\"modal\">Eliminar</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idPedido']]["idPedido"] . "\">"; ?>
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
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idPedido']]['idPedido'];?>"></label></strong></td>
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
                        <form method="post" name="ver">
                            <input id="idProducto" name="idProducto" style="display:none" value="<?php echo $array[$row['idPedido']]['idProducto'];?>">
                        <?php echo "<button value=\"".$array[$row['idPedido']]['idPedido']."\" type=\"submit\" name=\"ver\" class=\"btn btn-success btn-sm\">Ver</button>"; ?>
                        </form>
                    </td>
                </tr>

<?php
}


mysqli_close($con);

?>