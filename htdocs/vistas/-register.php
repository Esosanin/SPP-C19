<?php
include "-sesion_on.php";

if($sesion_on){
    header("Location: -login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SP-C19 - Papelerias online</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body style="display: flex; flex-direction: column;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SPP - C19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="-login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="-register.php">Registrar<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">


        <div style="height:100%; width:100%;" class="col-lg-12">
            <div class="row">
                <div class="col-md-12">

                    <!-- Registro -->

                    <form action="operaciones/registrar.php" method="post" enctype="multipart/form-data">
                        <h3>Registrarse</h3>

                        <table class="table">
                            <!-- Comienza Nombre y Apellido -->
                            <tr>
                                <td>
                                    <label for="registro_nombre">Nombre</label>
                                </td>
                                <td>
                                    <label for="registro_apellido">Apellido</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" id="registro_nombre" name="registro_nombre" placeholder="Tu nombre" title="Nombre del cliente. (Ejemplo: Jose Francisco)" maxlength="50" required>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="registro_apellido" name="registro_apellido" placeholder="Tu apellido" title="Apellido del cliente. (Ejemplo: Ramirez Navarro)" maxlength="50" required>
                                </td>
                            </tr>
                                <!-- Termina Nombre y Apellido -->

                                <!-- Comienza correo y celular -->
                            <tr>
                                <td>
                                    <label for="registro_correo">Correo electrónico</label>
                                </td>
                                <td>
                                    <label for="registro_celular">Número de teléfono</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" id="registro_correo" name="registro_correo" placeholder="Tu correo electrónico" title="Colocar su correo electrónico. (Ejemplo: ejemplo@gmail.com)" maxlength="50" required>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="registro_celular" name="registro_celular" placeholder="Tu número de teléfono" title="Colocar su numero de celular. (Ejemplo: 6655477321)" maxlength="15" required>
                                </td>
                            </tr>
                                <!-- Termina correo y celular -->


                                <!-- Comienza calle y número -->
                            <tr>
                                <td>
                                    <h5>Dirección</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="registro_calle">Calle</label>
                                </td>
                                <td>
                                    <label for="registro_numero">Número</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" id="registro_calle" name="registro_calle" placeholder="Tu calle" title="Nombre de la calle principal de su hogar." maxlength="50" required>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="registro_numero" name="registro_numero" placeholder="Tu número exterior" title="Numero exterior de su hogar. (Se aloja en la parte exterior del hogar)" maxlength="3" required>
                                </td>
                            </tr>
                                <!-- Termina calle y número -->


                                <!-- Comienza colonia y codigo postal -->
                            <tr>
                                <td>
                                    <label for="registro_colonia">Colonia</label>
                                </td>
                                <td>
                                    <label for="registro_cp">C.P.</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="text" id="registro_colonia" name="registro_colonia" placeholder="Tu colonia" title="Nombre de la colonia a la que pertenece." maxlength="50" required>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="registro_cp" name="registro_cp" placeholder="Tu código postal" title="Seríe de digitos. (Ejemplo: 83000)" maxlength="7" required>
                                </td>
                            </tr>
                                <!-- Termina colonia y codigo postal -->

                        </table>

                        <!-- Comienzo Tipo de Usuario -->

                        <table class="table">
                            <tr align="left">
                                <td><label for="tipo_usuario">Seleccione el tipo de usuario</label></td>
                                <td>
                                <select id="tipo_usuario" class="btn btn-secondary" name="tipo_usuario" title="Seleccione el tipo de usuario. (Cliente o Tienda)">
                                    <option value="2">Tienda</option>
                                    <option value="3" selected>Cliente</option>
                                </select>
                                </td>
                            </tr>
                        </table>

                        <!-- Termina Tipo de Usuario -->

                        <div id="3" class="tipo_usuario">
                        <table class="table">
                            <!-- Comienza imagen -->
                            <tr>
                                <td>
                                    <label for="registro_imagen">Imagen</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn" type="file" id="imagen" name="imagen" accept="image/jpeg">
                                </td>
                                <td>
                                    <img style="width:200px; height: auto;" id="imagenPrevisualizacion"><!--   Aquí va la imagen, está limitada en tamaño a 200px     -->
                                </td>
                            </tr>
                            <!-- Termina imagen -->
                        </table>
                        </div>

                        <!--          Datos de tienda              -->


                        <div id="2" class="tipo_usuario" style="display:none">

                            <table class="table">
                                <tr>
                                    <td>
                                        <h5>Datos de tienda</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="registro_nombre_tienda">Nombre de tienda</label></td>
                                    <td><label for="registro_rfc">RFC</label></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" id="registro_nombre_tienda" name="registro_nombre_tienda" placeholder="Nombre de la tienda" title="Nombre de la tienda. (Ejemplo: Papelería de Pepe)"  maxlength="50"></td>
                                    <td><input class="form-control" type="text" id="registro_rfc" name="registro_rfc" placeholder="RFC" title="Registro Federal de Contribuyentes. (Ejemplo: RRED870305TR2)"  maxlength="13"></td>
                                </tr>
                                <tr>
                                    <td COLSPAN="2">
                                        <label for="registro_rfc">Descripción</label>
                                        <textarea maxlength="255" id="registro_descripcion_tienda" class="form-control" name="registro_descripcion_tienda" rows="3" placeholder="Descripción de la tienda" title="Descripción de lo que vende la tienda." ></textarea>
                                    </td>
                                </tr>
                            </table>

                        </div>


                        <!--      Termina datos de la tienda       -->


                        <table class="table">
                            <!-- Comienza usuario, contraseña y registrarse-->
                            <tr>
                                <td> <label for="Registro_usuario">Usuario</label></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" id="Registro_usuario" name="Registro_usuario" placeholder="Tu usuario" title="Un nombre de usuario apropiado debe comenzar con una letra, contener letras, números, guiones bajos y puntos, y tener entre 3 y 15 caracteres de longitud." maxlength="35" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="registro_contraseña">Contraseña</label></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="password" id="registro_contraseña" name="registro_contraseña" placeholder="Tu contraseña" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres." maxlength="32" required></td>
                                <td><input class="form-control" type="password" id="registro_confirma_contraseña" name="registro_confirma_contraseña" placeholder="Confirma tu contraseña" title="Colocar la misma contraseña" maxlength="32" required></td>
                            </tr>
                            <tr>
                                <td><input class="btn btn-success" type="submit" name="registro" value="Registrarse"></td>
                            </tr>
                            <!-- Termina usuario, contraseña y registrarse-->
                        </table>

                    </form>

                </div>
            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Footer -->
    <hr>
    <footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="operaciones/previsualizar.js"></script>

    <script>
        // ORIGINAL
        //$('#tipo_usuario').change(function() {
        //    $('.tipo_usuario').hide();
        //    $('#' + $(this).val()).show();
        //});

    //script para ocultar el div de tienda
        $('#tipo_usuario').change(function() {
            $('.tipo_usuario').hide();
            if ($(this).val()==2){
                $('#' + 2).show();
            }else{
                $('#' + 3).show();
            }
        });
    </script>

</body>

</html>
