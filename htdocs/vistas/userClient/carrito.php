<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

if (isset($_POST['lend'])){
    $type = $_POST['tipo_e'];
    if ($type == 2){
        $cp = $_POST['cp'];
        $calle = $_POST['calle'];
        $num = $_POST['num'];
        $col = $_POST['col'];
    }elseif ($type == 3){
        $cp = $_SESSION['cp'];
        $calle = $_SESSION['calle'];
        $num = $_SESSION['num'];
        $col = $_SESSION['col'];
    }
    $id = $_SESSION['idCliente'];
    include 'proceso/send_purchase.php';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SP-C19 - Papelerias online</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">


    <?php
    
    $id=$_SESSION['idCliente'];
    
    ?>

</head>

<body style="display: flex; flex-direction: column;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SPP - C19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            include "-header.php";
            ?>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-sm">
            <!-- Tabla de productos -->

            <a href="#tipo_entrega" class="btn btn-success" data-toggle="modal">Continuar con la compra</a>

            <br><br>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                    <th>Opciones</th>
                </tr>
                <?php
                    //importo la info del carrito
                    include 'info_carrito.php';
                    ?>
            </table>
        </div>
    </div>
    <!-- /.container -->



    <!-- Modal tipo de entrega -->
    <div class="modal fade" id="tipo_entrega">

        <div class="modal-dialog">

            <div class="modal-content">
                <form method="POST" name="lend">
                <div class="modal-header">
                    <!--Header-->

                    <h4 class="motal-title">Seleccione el tipo de entrega</h4>
                    <button align="right" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <!--Contenido-->
                
                <div class="modal-body">

                    <select id="tipo_e" class="btn btn-secondary form-control" name="tipo_e">
                        <!--    Al seleccionar Tienda, se mostrará el div con id 2    -->
                        <option value="2">Entrega a domicilio</option>
                        <option value="3" selected>Recoger en la sucursal</option>
                    </select>

                    <div id="2" class="tipo_e" style="display:none">
                        <br>

                        <h5>Dirección</h5>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="calle" placeholder="Calle" value="<?php echo $_SESSION['calle'];?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="num" placeholder="Número" value="<?php echo $_SESSION['num'];?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="col" placeholder="Colonia" value="<?php echo $_SESSION['col'];?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="cp" placeholder="CP" value="<?php echo $_SESSION['cp'];?>">
                                </div>
                            </div>
                            <br>
                            <!--
                            <div class="row">

                                <div class="col-12">

                                    <input type="text" class="form-control" name="referencia" placeholder="Referencia">

                                </div>

                            </div>
                            -->

                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer">

                    <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    <button type="submit" name="lend" class="btn btn-success">Continuar</button>

                </div>
                </form>
            </div>

        </div>

    </div>


    <!-- Footer -->
    <hr>
    <footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <Script>
        //script para ocultar el div direccion
        $('#tipo_e').change(function() {
            $('.tipo_e').hide();
            $('#' + $(this).val()).show();
        });

    </Script>
</body>

</html>
