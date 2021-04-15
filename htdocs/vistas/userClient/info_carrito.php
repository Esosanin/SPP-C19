<?php
include '../db.php';

$idCliente = $id;

//dirección de la imagen de los productos
$d_imagen_producto="../imageShop/";

$query= "SELECT PRODUCTO.nombre, PRODUCTO.descripcion, IMAGEPRODUCTO.name, CARRITO.idCliente, CARRITO.idProducto, CARRITO.idTienda, CARRITO.precio, CARRITO.cantidad FROM CARRITO, PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.idProducto = CARRITO.idProducto AND CARRITO.idTienda = PRODUCTO.idAdmTienda AND CARRITO.idCliente = '".$idCliente."'";

//esta es la info del carrito, hay que extraer los nombres para mostrarlos
$info=mysqli_query($con, $query);

$array;
$array_request;

//aquí voy a imprimir todo
while($row=mysqli_fetch_assoc($info)){
?>
<?php
    $image = $d_imagen_producto."producto.jpg";
    if ($row['name']!=null){
        $image = $d_imagen_producto.$row['idProducto'].'_'.$row['name'];
    }

    $array_request = array("idProd" => $row['idProducto'], "idTienda" => $row['idTienda'], "idCliente" => $row['idCliente'], "name" => $row['nombre'], "cant" => $row['cantidad'], "price" => $row['precio'], "image" => $image);
    $array[$row['idProducto']] = $array_request;

?>
<tr>
    <td><?php echo $array[$row['idProducto']]["idProd"]; ?></td>
    <td><img src="<?php echo $image; ?>" style="width:80px; height: auto;" class="img-thumbnail"></img></td>
    <td><?php echo $array[$row['idProducto']]['name']; ?></td>
    <td><?php echo $array[$row['idProducto']]['cant']; ?></td>
    <td>
        
        <?php echo "<a href=\"#detalles_" . $array[$row['idProducto']]['idProd'] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles</a>"; ?>
        <!--Detalles producto-->
        <?php echo "<div id=\"detalles_".$array[$row['idProducto']]['idProd']."\" class=\"modal fade\" role=\"dialog\">"; ?>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Header-->
                        <h4 class="motal-title">Detalles del producto</h4>
                    </div>
                    <!--Contenido-->
                    <div class="modal-body">
                        <table>
                            <tr align="center">
                                <td>Nombre: <?php echo $array[$row['idProducto']]['name']; ?></td>
                                <td rowspan="2" colspan="2"> 
                                    <?php 
                                    $imagevalue="../imageShop/producto.jpg"; 
                                    if ($row['name'] != null){ 
                                        $imagevalue = $array[$row['idProducto']]['image']; 
                                    }
                                    echo "<img class='img-thumbnail' src='".$imagevalue."' style='width:80px; height: auto;'></img>"; ?>
                                </td>
                            </tr>
                            <tr></tr>
                            <tr align="center">
                                <td>Precio: $<?php echo $array[$row['idProducto']]['price']; ?></td>
                                <td></td>
                                <td>Cantidad: <?php echo $array[$row['idProducto']]['cant']; ?></td>
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
        
        <?php echo "<a href=\"#eliminar_".$array[$row['idProducto']]['idProd']."\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Eliminar</a>"; ?>
        <!--Eliminar producto-->
        <?php echo "<div id=\"eliminar_".$array[$row['idProducto']]['idProd']."\" class=\"modal fade\">"; ?>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Header-->
                        <h4 class="motal-title">Eliminar producto</h4>
                    </div>
                    <!--Contenido-->
                    <div class="modal-body">
                        <h5>¿Está seguro que desea elminar el producto "<?php echo $array[$row['idProducto']]['name']; ?>" del carrito de compras?</h5>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                        <a href="<?php echo 'proceso/baja_producto.php?id='.$array[$row['idProducto']]['idCliente'].'&idProd='.$array[$row['idProducto']]['idProd'].'&idTienda='.$array[$row['idProducto']]['idTienda']; ?>" type="button" name="baja" class="btn btn-success">Continuar</a>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
<?php

    //Importo los modals
    include 'modals_carrito.php';
    }

    mysqli_close($con);
    ?>
