<!--Ingresar producto-->
<div class="modal fade" id="ingresar">

    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-header">
                <!--Header-->

                <h4 class="motal-title">Ingresar nuevo producto</h4>

            </div>
            <form method="post" name="create" enctype="multipart/form-data">
                <!--Contenido-->
                <div class="modal-body">
                    <table>
                        <tr align="center">
                            <th colspan="2"><label for="image_producto">Imagen</label></th>
                        </tr>
                        <tr>
                            <td>
                                <img height="100px" width="100px" id="imagenPrevisualizacion"></img><!--   Aquí va la imagen, está limitada en tamaño a 100px     -->
                            </td>
                            <td colspan="2" align="left">
                                <input class="btn" type="file" id="imagen" name="imagen" accept="image/jpeg">
                            </td>
                        </tr>
                    </table>
                    <label for="nombre_producto">Nombre</label>
                    <input class="form-control" type="text" name="name" placeholder="Nombre del producto" required>

                    <label for="precio_producto">Precio</label>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="price" type="number" class="form-control" placeholder="Precio del producto" min="0" required>
                    </div>

                    <label for="descripcion_producto">Descripción</label>
                    <textarea class="form-control" name="description" placeholder="Descripción del producto" cols="1" rows="3" maxlenght="255"></textarea>

                    <label for="cantidad_producto">Cantidad</label>
                    <input name="cant" type="number" class="form-control" placeholder="Cantidad del producto" min="0" required>

                    <label for="escolaridad">Grado de escolaridad</label>
                    <select class="form-control" name="escolaridad">
                        <option value="0" selected>General</option>
                        <option value="1">Primaria</option>
                        <option value="2">Secundaria</option>
                        <option value="3">Preparatoria</option>
                        <option value="4">Universidad</option>
                    </select>

                </div>
            <!--Footer-->
            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                <input type="submit" name="create" class="btn btn-success" value="Continuar">

            </div>
            </form>
        </div>

    </div>

</div>



<!--Eliminar producto-->
<div class="modal fade" id="eliminar">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <!--Header-->

                <h4 class="motal-title">Eliminar producto</h4>
                <button align="right" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <!--Contenido-->
            <div class="modal-body">

                <h5>Está seguro que desea elminar el producto "nombre_producto"?</h5>
                id del producto: "id_producto"

            </div>

            <!--Footer-->
            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                <button data-dismiss="modal" class="btn btn-success">Continuar</button>

            </div>

        </div>

    </div>

</div>


<!--Detalles producto-->
<div class="modal fade" id="detalles">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <!--Header-->

                <h4 class="motal-title">Detalles</h4>
                <button align="right" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <!--Contenido-->
            <div class="modal-body">
            
            
            <h6>ID:</h6>
            id_producto
            
            <h6>Nombre:</h6>
            nombre_producto
            
            <h6>Descripción:</h6>
            descripcion_producto
            
            <h6>Precio:</h6>
            precio_producto
            
            <h6>Cantidad disponible:</h6>
            cantidad_producto
            
            <h6>Fecha de registro:</h6>
            fecha_producto
            
            <h6>Grado de escolaridad:</h6>
            grado_escolaridad
            
            
            </div>

            <!--Footer-->
            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-danger">Cerrar</button>

            </div>

        </div>

    </div>

</div>






<!-- Editar producto-->
<div class="modal fade" id="editar">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <!--Header-->

                <h4 class="motal-title">Ingresar nuevo producto</h4>
                <button align="right" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <!--Contenido-->
            <div class="modal-body">

                <form action="">

                    <label for="nombre_producto">Nombre</label>
                    <input class="form-control" type="text" name="nombre_producto" placeholder="Nombre del producto">

                    <label for="precio_producto">Precio</label>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="precio_producto" type="number" class="form-control" placeholder="Precio del producto">
                    </div>

                    <label for="descripcion_producto">Descripción</label>
                    <textarea class="form-control" name="descripcion_producto" placeholder="Descripción del producto" cols="1" rows="3"></textarea>

                    <label for="cantidad_producto">Cantidad</label>
                    <input name="cantidad_producto" type="number" class="form-control" placeholder="Precio del producto">

                    <label for="escolaridad_producto">Grado de escolaridad</label>
                    <select class="form-control" name="escolaridad_producto">
                        <option value="1">Primaria</option>
                        <option value="2">Secundaria</option>
                        <option value="3">Preparatoria</option>
                        <option value="4">Universidad</option>
                    </select>

                </form>

            </div>

            <!--Footer-->
            <div class="modal-footer">

                <button data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                <button data-dismiss="modal" class="btn btn-success">Continuar</button>

            </div>

        </div>

    </div>

</div>
