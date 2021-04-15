<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

if (isset($_POST['baja'])){
    include "../db.php";
    include "proceso/-delete_comment.php";
    mysqli_close($con);
}

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
            <!-- Tabla de comentarios -->
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Comentarios</h5>
            </div>
            <table class="table">
                <tr align="center">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Puntuación</th>
                    <th>Registro</th>
                    <th colspan="2">Opciones</th>
                </tr>
                <?php
                $Tienda = $_SESSION['idAdmin'];
                include 'proceso/-details_comment.php';
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
