<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

if(isset($_POST['Modificar'])){
    header("Location: -admin_modifier.php");
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
            <?php
                include '-header.php';
            ?>
        </div>
    </nav>

    <!-- Page Content -->
    <br>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <!-- Perfil -->
                    <div class="image-logo" align="left"><img src="../imageAdmin/-logo.jpg" height="100px" width="100px"></div>
                    <br>
                    <form method="post" name="Modificar">
                        <table clase="table" width="75%" align="center" cellspacing="3" cellpadding="20">
                            <!-- Comienza Perfil y foto -->
                            <tr>
                                <td colspan="2" align="left">
                                    <div class="image-perfil"><?php $imagevalue=''; if(!empty($_SESSION['image'])){$imagevalue="../imageAdmin/".$_SESSION['image']; }else{$imagevalue="../imageClient/persona.png";} echo "<img src='".$imagevalue."' height='100px' width='100px'>"; ?></div>
                                </td>
                                <td colspan="5" align="left">
                                    <h3>Perfil</h3>
                                </td>
                            </tr>
                            <!-- Comienza nombre, apellido y boton -->
                            <tr>
                                <td colspan="7"><label for="nombre_tienda"><strong>Nombre de la tienda: </strong><?php echo $_SESSION['shop']; ?></label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="nombre"><strong>Nombre: </strong><?php echo $_SESSION['fname'];?></label></td>
                                <td colspan="3"></td>
                                <td colspan="2"><label for="apellido"><strong>Apellido: </strong><?php echo $_SESSION['lname'];?></label></td>
                            </tr>
                            <!-- Dirección -->
                            <tr>
                                <td colspan="7"><label for="direccion"><h4>Dirección</h4></label></td>
                            </tr>
                            <!-- Dirección pt.1 -->
                            <tr>
                                <td colspan="2"><label for="direccion-calle"><strong>Calle: </strong><?php echo $_SESSION['calle']; ?></label></td>
                                <td colspan="3" align="center"><label for="direccion-numero"><strong>Numero: </strong><?php echo $_SESSION['num']; ?></label></td>
                                <td colspan="2"><label for="direccion-cp"><strong>CP: </strong><?php echo $_SESSION['cp']; ?></label></td>
                                <td align="center"></td>
                            </tr>
                            <!-- Dirección pt.2 -->
                            <tr>
                                <td  colspan="2"><label for="celular"><strong>Celular: </strong><?php echo $_SESSION['cel']; ?></label></td>
                                <td colspan="3" align="center"><label for="direccion-colonia"><strong>Colonia: </strong><?php echo $_SESSION['col']; ?></label></td>
                                <td colspan="2"><label for="correo_tienda"><strong>Email: </strong><?php echo $_SESSION['email']; ?></label></td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2"><label for="rfc"><strong>RFC: </strong><?php echo $_SESSION['rfc']; ?></label></td>
                                <td colspan="5" rowspan="2"><label for="descripcion_tienda"><strong>Descripción: </strong><?php echo $_SESSION['descripcion']; ?></label></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td><label for="usuario"><strong>Usuario: </strong><?php echo $_SESSION['user']; ?></label></td>
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
                                <td colspan="7" align="right"><input class="btn btn-warning" type="button" onclick="window.location='-admin_modifier.php'" value="Modificar"></td>
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
    <script src="../operaciones/previsualizar.js"></script>
</body>
<!-- Footer -->
<footer style="display: flex; flex-flow: row wrap;" class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

</html>