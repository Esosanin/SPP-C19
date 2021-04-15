<?php
$query = "SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.idAdmTienda ='".$_SESSION['idAdmin']."' ORDER BY PRODUCTO.idProducto";
$result = mysqli_query($con, $query);

$array;
$array_request;

while($row=mysqli_fetch_assoc($result)){​​​​​​
?>
<?php

$array_request = array("id" => $row['idProducto'], "name" => $row['nombre'], "descript" => $row['descripcion'], "cant" => $row['cantidad'], "price" => $row['precio'], "grado" => $row['gradoEscolaridad'], "date" => $row['fechaRegistro'], "image" => $row['name']);
$array[$row['idProducto']] = $array_request;
?>
                <tr align="center">
                    <td><?php echo $array[$row['idProducto']]["id"];?></td>
                    <td align="center"><div class="image-product">
                    <?php 
                    $imagevalue="../imageShop/"; 
                    if ($array[$row['idProducto']]["image"] != null){ 
                        $imagevalue = $imagevalue.$array[$row['idProducto']]['id'].'_'.$array[$row['idProducto']]["image"];
                    }else{
                        $imagevalue="../imageShop/producto.jpg";
                    } 
                    echo "<img class='img-thumbnail' src='".$imagevalue."'  style='width:80px; height: auto;'></img>";?>
                    </div></td>
                    <td align="center"><?php echo $array[$row['idProducto']]["name"];?></td>
                    <td align="center"><?php echo $array[$row['idProducto']]["date"];?></td>
                    <td align="center">
                        <?php echo "<a href=\"#Details_" . $array[$row['idProducto']]["id"] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles...</a>"; ?>
                        <!--Ventana emergente Detalles-->
                        <?php echo "<div id=\"Details_" . $array[$row['idProducto']]["id"] . "\" class=\"modal fade\" role=\"dialog\">";?>
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
                                                <td>ID: <?php echo $array[$row['idProducto']]["id"]; ?></td>
                                                <td rowspan="2" colspan="2"> 
                                                <?php 
                                                $imagevalue="../imageShop/"; 
                                                if ($array[$row['idProducto']]["image"] != null){ 
                                                    $imagevalue = $imagevalue.$array[$row['idProducto']]['id'].'_'.$array[$row['idProducto']]["image"]; 
                                                }else{
                                                    $imagevalue="../imageShop/producto.jpg";
                                                } 
                                                echo "<img class='img-thumbnail' src='".$imagevalue."' style='width:80px; height: auto;'></img>"; ?>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td>Nombre: <?php echo $array[$row['idProducto']]["name"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left"colspan="3" rowspan="2">Descripción: <?php echo $array[$row['idProducto']]["descript"]; ?></td>
                                            </tr>
                                            <tr></tr>
                                            <tr align="center">
                                                <td>Precio: $<?php echo $array[$row['idProducto']]["price"]; ?></td>
                                                <td></td>
                                                <td>Cantidad: <?php echo $array[$row['idProducto']]["cant"]; ?></td>
                                            </tr>
                                            <tr align="center">
                                                <td>Fecha Registro: <?php echo $array[$row['idProducto']]["date"]; ?></td>
                                                <td></td>
                                                <td>Grado de Escolaridad: <?php switch($array[$row['idProducto']]["grado"]){ case 0: echo 'General'; break; case 1: echo 'Primaria'; break; case 2: echo 'Secundaria'; break; case 3: echo 'Preparatoria'; break; case 4: echo 'Universidad'; break;}?></td>
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
                        <?php echo "<a href=\"#edit_" . $array[$row['idProducto']]["id"] . "\" class=\"btn btn-info btn-large btn-primary\" data-toggle=\"modal\">Actualizar</a>";?>
                        <?php echo "<div class=\"modal fade\" id=\"edit_" .$array[$row['idProducto']]["id"] . "\">"; ?>
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" name="edit" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <!--Header-->
                                            <h4 class="motal-title">Actualizar Producto</h4>
                                        </div>
                                        <!--Contenido-->
                                        <div class="modal-body">
                                            <table class="table">
                                                <tr align="center">
                                                    <td>ID:</td>
                                                    <td><input name="id" type="text" value="<?php echo $array[$row['idProducto']]['id'];?>" readonly></td>
                                                    <td></td>
                                                    <td colspan="2" rowspan="2" align="center">
                                                        <input class="btn" type="file" id="imagen" name="imagen" accept="image/jpeg">
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <td>Nombre:</td>
                                                    <td><input name="name" type="text" value="<?php echo $array[$row['idProducto']]['name']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Descripción: </td><td align="center" colspan="4"><textarea class="form-control" name="descripcion" rows=2 cols=70 value="<?php echo $array[$row['idProducto']]['descript']; ?>" maxlength="255"></textarea></td>
                                                </tr>
                                                <tr></tr>
                                                <tr align="center">
                                                    <td>Precio:</td>
                                                    <td>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                            <input name="price" type="number" value="<?php echo $array[$row['idProducto']]['price']; ?>">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>Cantidad:</td>
                                                    <td><input name="cant" type="number" value="<?php echo $array[$row['idProducto']]['cant']; ?>"></td>
                                                </tr>
                                                <tr align="center">
                                                    <td>Fecha Registro:</td>
                                                    <td><input type="date" value="<?php echo $array[$row['idProducto']]['date']; ?>" readonly></td>
                                                    <td></td>
                                                    <td>Grado de Escolaridad:</td>
                                                    <td>
                                                        <?php $a = ""; $b = ""; $c = ""; $d = ""; $e = ""; switch($array[$row['idProducto']]["grado"]){ case 0: $a="selected"; break; case 1: $b="selected"; break; case 2: $c="selected"; break; case 3: $d="selected"; break; case 4: $e="selected"; break;}?>
                                                        <select class="form-control" name="escolaridad">
                                                            <option value="0" <?php echo $a;?>>General</option>
                                                            <option value="1" <?php echo $b;?>>Primaria</option>
                                                            <option value="2" <?php echo $c;?>>Secundaria</option>
                                                            <option value="3" <?php echo $d;?>>Preparatoria</option>
                                                            <option value="4" <?php echo $e;?>>Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="left">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" align="right">
                                                        <button type="submit" name="edit" class="btn btn-success">Continuar</button>
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
                        <?php echo "<a href=\"#baja_" . $array[$row['idProducto']]["id"] . "\" class=\"btn btn-info btn-large btn-danger\" data-toggle=\"modal\">Eliminar</a>"; ?>
                        <?php echo "<div class=\"modal fade\" id=\"baja_" .$array[$row['idProducto']]["id"] . "\">"; ?>
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
                                                <tr align="center">
                                                    <td>¿Estas seguro de eliminar la solicitud con ID:</td>
                                                    <td><strong><input id="id" name="id" value="<?php echo $array[$row['idProducto']]['id'];?>"></label></strong></td>
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