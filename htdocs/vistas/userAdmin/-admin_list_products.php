<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

if (isset($_POST['create'])){
    include "../db.php";
    $id = $_SESSION['idAdmin'];
    include "proceso/-create_product.php";
    mysqli_close($con);
}

if (isset($_POST['edit'])){
    include "../db.php";
    $descripcion = $_SESSION['descripcion'];
    $id = $_SESSION['idAdmin'];
    include "proceso/-update_product.php";
    mysqli_close($con);
}

if (isset($_POST['baja'])){
    include "../db.php";
    $id = $_SESSION['idAdmin'];
    include "proceso/-delete_product.php";
    mysqli_close($con);
}

if (isset($_POST['import'])){
    include "../db.php";
    $id = $_SESSION['idAdmin'];
    include "proceso/-import_csv.php";
    mysqli_close($con);
}

include ("../db.php");
?>
<!DOCTYPE html>
<html lang="es" style="position: relative;">

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



    <?php //Importo los modals
    include 'modals_productos.php'
    ;?>

</head>

<body style="display: flex; flex-direction: column;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema de Pedidos a Papelerias - Covid19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                include '-header.php';
            ?>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-sm">
            <!-- Tabla de productos -->

            <div class="row">

                <div class="col align-self-start"></div>
                <div class="col align-self-center"></div>
                    <form method="post" enctype="multipart/form-data" name="import" id="import_form">
                        <table class="table">
                            <tr align="rigth">
                                <td>
                                    <a href="#ingresar" class="btn btn-success btn-large" data-toggle="modal">Ingresar nuevo producto</a>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-success" name="import" value="IMPORT CSV"/>
                                    <input type="file" name="file" accept=".csv" required/>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                    </form>
                <div class="col align-self-end"></div>
            </div>

            <table class="table">
                <tr align="center">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Nombre del producto</th>
                    <th>Fecha Registro</th>
                    <th colspan="3">Opciones</th>
                </tr>
                <?php
                include 'proceso/-details.php';
                ?>
            </table>
        </div>
    </div>
    <!-- /.container -->


    <!-- Footer -->
    <br>
    <footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../operaciones/previsualizar.js"></script>
    
</body>

</html>
