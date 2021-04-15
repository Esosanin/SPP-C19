<?php

$result = mysqli_query($con, $query);
$array;
$array_client;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$estado='';
if(isset($row['idSuspension'])){
    $estado = 'table-danger';
}

$array_client = array("id" => $row['idUsuario'], "fname" => $row['nombre'], "lname" => $row['apellido'], "email" => $row['email'], "cel" => $row['celular'], "date" => $row['fechaRegistro']);
$array[$row['idCliente']] = $array_client;
?>
                <tr class="<?php echo $estado; ?>">
                    <td align="center"><?php echo $array[$row['idCliente']]["id"]; ?></td>
                    <td align="center"><?php echo $array[$row['idCliente']]["fname"] . ' ' . $array[$row['idCliente']]["lname"]; ?></td>
                    <td align="center"><?php echo $array[$row['idCliente']]["date"]; ?></td>
                    <td align="center">
                        <?php echo "<a href=\"#modal_Detalles_" . $array[$row['idCliente']]["id"] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles...</a>"; ?>
                        <!--Ventana emergente Detalles-->
                        <?php echo "<div id=\"modal_Detalles_" . $array[$row['idCliente']]["id"] . "\" class=\"modal fade\" role=\"dialog\">";?>
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
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Correo electrónico</th>
                                                <th>Celular</th>
                                            </tr>
                                            <tr align="center">
                                                <td><?php echo $array[$row['idCliente']]["id"]; ?></td>
                                                <td><?php echo $array[$row['idCliente']]["fname"]; ?></td>
                                                <td><?php echo $array[$row['idCliente']]["lname"]; ?></td>
                                                <td><?php echo $array[$row['idCliente']]["email"]; ?></td>
                                                <td><?php echo $array[$row['idCliente']]["cel"]; ?></td>
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
                        <?php echo "<a href=\"#Suspender_" . $array[$row['idCliente']]["id"] . "\" class=\"btn btn-info btn-large btn-warning\" data-toggle=\"modal\">Suspender</a>" ?>
                        <!--Ventana emergente Suspensión-->
                        <?php echo "<div class=\"modal fade\" id=\"Suspender_" .$array[$row['idCliente']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="suspender">
                                        <div class="modal-header">
                                        <!--Header-->
                                            <h4 class="motal-title">Suspender Usuario</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr>
                                                    <td>Suspendera al usuario con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idCliente']]['id'];?>"></label></strong></td>
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
                        <?php echo "<a href=\"#baja_" . $array[$row['idCliente']]["id"] . "\" class=\"btn btn-info btn-large btn-danger\" data-toggle=\"modal\">Baja</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idCliente']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="baja">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Baja de Usuario</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de eliminar al usuario con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idCliente']]['id'];?>"></label></strong></td>
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
                        <?php echo "<a href=\"#restore_" . $array[$row['idCliente']]["id"] . "\" class=\"btn btn-info btn-large btn-primary\" data-toggle=\"modal\">Restaurar</a>";?>
                        <?php echo "<div class=\"modal fade\" id=\"restore_" .$array[$row['idCliente']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="restore">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Restaurar Usuario</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table>
                                                <tr align="left">
                                                    <td>¿Estas seguro de restaurar al usuario con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idCliente']]['id'];?>"></label></strong></td>
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