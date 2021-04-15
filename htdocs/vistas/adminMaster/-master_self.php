<?php

include "../-sesion_on.php";
if(!$sesion_on){
    header('Location: ../-login.php');
    exit;
}

if(isset($_POST['modificar'])){
    header("Location: -master_modifier.php");
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
            <?php include '-header.php';?>
        </div>
    </nav>

    <!-- Page Content -->
    <br>
    
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <!-- Perfil -->
                    <div class="image-logo" align="left">
                        <img src="../imageAdmin/-logo.jpg" height="100px" width="100px"></img>
                    </div>
                    <br>
                    <form method="POST" name="modificar">
                        <table clase="table" width="75%" align="center" cellspacing="3" cellpadding="10">
                            <!-- Comienza Perfil y foto -->
                            <tr>
                                <td colspan="2" align="left">
                                    <div class="image-perfil"><img src="../imageClient/persona.png" heigth="50px" width="50px"></div>
                                </td>
                                <td>
                                    <h3>Perfil</h3>
                                </td>
                            </tr>
                            <!-- Comienza nombre, apellido y boton -->
                            <tr>
                                <td><label for="nombre"><strong>Nombre: </strong></label></td>
                                <td><?php echo $_SESSION['fname'];?></td>
                                <td><label for="apellido"><strong>Apellido: </strong></label></td>
                                <td><?php echo $_SESSION['lname'];?></td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td><label for="usuario"><strong>Usuario: </strong></label></td>
                                <td><?php echo $_SESSION['user'];?></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="3" align="left"><input class="btn btn-warning" type="submit" name="modificar" value="Modificar"></td>
                            </tr>
                        </table>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Footer -->
<footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>
</html>