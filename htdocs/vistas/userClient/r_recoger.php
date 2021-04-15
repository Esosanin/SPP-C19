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
                include '-header.php';
            ?>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">


        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <!-- Registro exitoso -->
                    <div class="align-middle">

                        <div align="center" class="alert alert-success" role="alert">
                            <h5>ACCIÓN REALIZADA EXITOSAMENTE</h5>
                            <h6>PUEDE RECOGER EL PEDIDO EN MENOS DE 10 MIN NOTA: SI NO HAY PEDIDOS PENDIENTES, PUEDE RECOGERLO INMEDIATAMENTE.</h6>
                        </div>
                        <br>
                        <div class="image-logo" align="center">
                            <img class="img-responsive center-block" src="../materiales/img/exito_2.png" style="width:180px; height: auto;">
                        </div>

                    </div>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
