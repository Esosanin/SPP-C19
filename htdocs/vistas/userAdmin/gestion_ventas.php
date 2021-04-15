<?php
include "../-sesion_on.php";

$valor = false;

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

if(isset($_POST['baja'])){
    $id = $_POST['id'];
    include "../db.php";
    include "proceso/-delete_venta.php";
    mysqli_close($con);
}

include "../db.php";
$idTienda = $_SESSION['idAdmin'];
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

    <div style="width:100%;  flex-grow: 1;" class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Lista de ventas</h5>
            </div>
            <font size="2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <table style="width:120%; height:50%;" class="table table-hover" id="tabla">
                    <tr>
                        <th>ID</th>
                        <th>ID Cliente</th>
                        <th>ID Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Fecha de Factura</th>
                        <th>Opciones</th>
                    </tr>
                    <?php
                    include "proceso/-details_ventas.php";
                    ?>
                </table>
            </div>
            </font>
        </div>
        <div class="col-sm-1"></div>

    </div>

    <!-- /.container -->

    <!-- Footer -->
    <hr>
    <footer style="display: flex; flex-flow: row; wrap;" class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body></html>