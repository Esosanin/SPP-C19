<?php

$result = mysqli_query($con, $query);
$array;
$array_request;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$array_request = array("id" => $row['idSolicitudes'], "nameShop" => $row['nombreTienda'], "fname" => $row['nombre'], "lname" => $row['apellido'], "email" => $row['email'], "cel" => $row['celular'], "cp" => $row['codigoPostal'], "calle" => $row['calle'], "num" => $row['numeroEdificio'], "rfc" => $row['rfc'], "descript" => $row['descripcion']);
$array[$row['idSolicitudes']] = $array_request;
?>
                <tr>
                    <td align="center"><?php echo $array[$row['idSolicitudes']]["id"];?></td>
                    <td align="center"><?php echo $array[$row['idSolicitudes']]["nameShop"];?></td>
                    <td align="center"><?php echo $array[$row['idSolicitudes']]["rfc"];?></td>
                    <td align="center">
                        <?php echo "<a href=\"#Details_" . $array[$row['idSolicitudes']]["id"] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles...</a>"; ?>
                        <!--Ventana emergente Detalles-->
                        <?php echo "<div id=\"Details_" . $array[$row['idSolicitudes']]["id"] . "\" class=\"modal fade\" role=\"dialog\">";?>
                            <div class="modal-dialog modal-lg modal-dialog-centered">

                            <!-- Contenido del Modal -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!--Header-->
                                        <h4 class="modal-title">Detalles de usuario</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <tr align="center">
                                                <td>ID: <?php echo $array[$row['idSolicitudes']]["id"]; ?></td>
                                                <td>Nombre Tienda: <?php echo $array[$row['idSolicitudes']]["nameShop"]; ?></td>
                                                <td>Nombre: <?php echo $array[$row['idSolicitudes']]["fname"]; ?></td>
                                                <td>Apellido: <?php echo $array[$row['idSolicitudes']]["lname"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Email: <?php echo $array[$row['idSolicitudes']]["email"]; ?></td>
                                                <td>Calle: <?php echo $array[$row['idSolicitudes']]["calle"]; ?></td>
                                                <td>CP: <?php echo $array[$row['idSolicitudes']]["cp"]; ?></td>
                                                <td>Número: <?php echo $array[$row['idSolicitudes']]["num"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Celular: <?php echo $array[$row['idSolicitudes']]["cel"]; ?></td>
                                                <td colspan="3" rowspan="2">Descripción: <?php echo $array[$row['idSolicitudes']]["descript"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>RFC: <?php echo $array[$row['idSolicitudes']]["rfc"]; ?></td>
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
                    </td>
                    <td align="center">
                        <?php echo "<a href=\"#baja_" . $array[$row['idSolicitudes']]["id"] . "\" class=\"btn btn-info btn-large btn-danger\" data-toggle=\"modal\">Eliminar</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idSolicitudes']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="baja">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Eliminar Solicitud</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de eliminar la solicitud con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idSolicitudes']]['id'];?>"></label></strong></td>
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
                    <td align="center">
                        <?php echo "<a href=\"#acepted_" . $array[$row['idSolicitudes']]["id"] . "\" class=\"btn btn-info btn-large btn-primary\" data-toggle=\"modal\">Aceptar</a>";?>
                        <?php echo "<div class=\"modal fade\" id=\"acepted_" .$array[$row['idSolicitudes']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="acepted">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Aceptar Solicitudes</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de aceptar la solicitud con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idSolicitudes']]['id'];?>"></label></strong></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                                    </td>
                                                    <td align="right">
                                                        <button type="submit" name="acepted" class="btn btn-success">Continuar</button>
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