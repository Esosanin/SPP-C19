<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

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
    <br>
    <!-- Page Content -->
    <div style="width:100%;  flex-grow: 1;" class="container">

        <div class="row">

            <div class="col-lg-12">
                <table class="table">
                    <tr align="center">
                        <td></td>
                        <td><div style="text-align:center"><img src="../imageAdmin/-logo.jpg" height="250px" width="250px"></div></td>
                    </tr>
                    <tr align="center">
                        <td><div style="text-align:right"><button class="btn btn-success" onclick="window.location='-admin_list_products.php'">Lista de productos</button></div></td>
                        <td><div style="text-align:center"><button class="btn btn-success" onclick="window.location='gestion_pedidos.php'">Pedidos</button></div></td>
                        <td><div style="text-align:left"><button class="btn btn-success" onclick="window.location='gestion_ventas.php'">Lista de ventas</button></div></td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <td><div style="text-align:center"><button class="btn btn-success" onclick="window.location='-admin_comment.php'">Comentarios</button></div></td>
                        <td><div style="text-align:left"><button class="btn btn-success" onclick="window.location='-admin_self.php'">Perfil</button></div></td>
                    </tr>
                </table>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>