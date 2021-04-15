<!--Eliminar producto-->
<?php echo "<div class=\"modal fade\" id=\"eliminar_".$info_productos['idProducto']."\">"; ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--Header-->
                <h4 class="motal-title">Eliminar producto</h4>
            </div>
            <!--Contenido-->
            <div class="modal-body">
                <h5>¿Está seguro que desea elminar el producto "<?php echo $productos['nombre']; ?>" del carrito de compras?</h5>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                <a href="eliminar_producto.php" class="btn btn-success">Continuar</a>
            </div>

        </div>

    </div>

</div>


<!--Detalles producto-->
<div class='modal fade' id="<?php echo '#detalles_'.$info_productos['idProducto']; ?>">
    <div class="modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!--Header-->
                <h4 class="motal-title">Detalles del producto</h4>
            </div>
        </div>

    </div>

</div>