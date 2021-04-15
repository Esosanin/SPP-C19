<?php

$result = mysqli_query($con, $query);
$array;
$array_admin;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$estado='';
if(isset($row['idSuspension'])){
    $estado = 'table-danger';
}

$array_admin = array("id" => $row['idUsuario'], "nameShop" => $row['nombreTienda'], "fname" => $row['nombre'], "lname" => $row['apellido'], "email" => $row['email'], "cel" => $row['celular'], "rfc" => $row['rfc'], "descript" => $row['descripcion']);
$array[$row['idAdmTienda']] = $array_admin;
?>
                <tr class="<?php echo $estado; ?>">
                    <td align="center"><?php echo $array[$row['idAdmTienda']]["id"];?></td>
                    <td align="center"><?php echo $array[$row['idAdmTienda']]["nameShop"];?></td>
                    <td align="center"><?php echo $array[$row['idAdmTienda']]["rfc"];?></td>
                    <td align="center">
                        <?php echo "<a href=\"#Details_" . $array[$row['idAdmTienda']]["id"] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles...</a>"; ?>
                        <!--Ventana emergente Detalles-->
                        <?php echo "<div id=\"Details_" . $array[$row['idAdmTienda']]["id"] . "\" class=\"modal fade\" role=\"dialog\">";?>
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
                                                <td>ID: <?php echo $array[$row['idAdmTienda']]["id"]; ?></td>
                                                <td>Nombre Tienda: <?php echo $array[$row['idAdmTienda']]["nameShop"]; ?></td>
                                                <td>Nombre: <?php echo $array[$row['idAdmTienda']]["fname"]; ?></td>
                                                <td>Apellido: <?php echo $array[$row['idAdmTienda']]["lname"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Email: <?php echo $array[$row['idAdmTienda']]["email"]; ?></td>
                                                <td>Celular: <?php echo $array[$row['idAdmTienda']]["cel"]; ?></td>
                                                <td colspan="2">RFC: <?php echo $array[$row['idAdmTienda']]["rfc"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Descripción: <?php echo $array[$row['idAdmTienda']]["descript"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                
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
                        <?php echo "<a href=\"#Suspender_" . $array[$row['idAdmTienda']]["id"] . "\" class=\"btn btn-info btn-large btn-warning\" data-toggle=\"modal\">Suspender</a>" ?>
                        <!--Ventana emergente Suspensión-->
                        <?php echo "<div class=\"modal fade\" id=\"Suspender_" .$array[$row['idAdmTienda']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="suspender">
                                        <div class="modal-header">
                                        <!--Header-->
                                            <h4 class="motal-title">Suspender Tienda</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr>
                                                    <td>Suspendera a la Tienda con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idAdmTienda']]['id'];?>"></label></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Fecha de comienzo</td>
                                                    <td><input id="comienzo" type="date" class="form-control" name="comienzo" min="2020-01-01" value="<?php echo date('Y-m-d');?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Fecha de conclusión</td>
                                                    <td><input id="finalizacion" type="date" class="form-control" name="finalizacion" min="2020-01-01" value="<?php echo date('Y-m-d');?>"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                                    </td>
                                                    <td align="right">
                                                        <button type="submit" name="suspender" class="btn btn-success">Continuar</button>
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
                        <?php echo "<a href=\"#baja_" . $array[$row['idAdmTienda']]["id"] . "\" class=\"btn btn-info btn-large btn-danger\" data-toggle=\"modal\">Baja</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idAdmTienda']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="baja">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Baja de Tienda</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de eliminar a la Tienda con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idAdmTienda']]['id'];?>"></label></strong></td>
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
                        <?php echo "<a href=\"#restore_" . $array[$row['idAdmTienda']]["id"] . "\" class=\"btn btn-info btn-large btn-primary\" data-toggle=\"modal\">Restaurar</a>";?>
                        <?php echo "<div class=\"modal fade\" id=\"restore_" .$array[$row['idAdmTienda']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="restore">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Restaurar Tienda</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de restaurar a la Tienda con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idAdmTienda']]['id'];?>"></label></strong></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                                    </td>
                                                    <td align="right">
                                                        <button type="submit" name="restore" class="btn btn-success">Continuar</button>
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