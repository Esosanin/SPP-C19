<?php
include "../-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
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
            
            <?php include '-header.php'?>

        </div>
    </nav>

    <!-- Page Content -->
	<br>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-lg-12">
			<div class="row">
		        <div class="col-md-12">
                <!-- Perfil -->
                <div class="image-logo" align="left"><img src="../imageAdmin/-logo.jpg" height="100px" width="100px"></img></div>
                <br>
                <form method="post" name="modifier">
                    <table clase="table" width="75%" align="center" cellspacing="3" cellpadding="20">
                        <!-- Comienza Perfil y foto -->
                        <tr>
                            <td colspan="2" align="left"><?php $imagevalue=''; if(!empty($_SESSION['image'])){$imagevalue="../imageClient/".$_SESSION['image']; }else{$imagevalue="../imageClient/persona.png";} echo "<img src='".$imagevalue."' class='img-thumbnail' style='width:150px; height: auto;'>"; ?></div></td>
                            <td><h3>Perfil</h3></td>
                        </tr>
                        <!-- Comienza nombre, apellido y boton -->
                        <tr>
                            <td colspan="2"><label for="nombre"><strong>Nombre: </strong><?php echo $_SESSION['fname'];?></label></td>
                            <td colspan="2"><label for="apellido"><strong>Apellido: </strong><?php echo $_SESSION['lname'];?></label></td>
                            <td colspan="2"></td>
                            <td align="center"><input class="btn btn-success btn-block" type="button" value="Historial de Pedidos" width="100%"></td>
                        </tr>
                        <!-- Dirección -->
                        <tr>
                            <td><label for="direccion"><h4>Dirección<h4></label></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="center"><input class="btn btn-success btn-block" type="button" value="Pedidos" width="100%"></td>
                        </tr>
                        <!-- Dirección pt.1 -->
                        <tr>
                            <td colspan="2"><label for="direccion-calle"><strong>Calle: </strong><?php echo $_SESSION['calle'];?></label></td>
                            <td colspan="2"><label for="direccion-colonia"><strong>Colonia: </strong><?php echo $_SESSION['col'];?></label></td>
                            <td colspan="2"></td>
                            <td align="center"><a href="carrito.php" class="btn btn-success btn-block" type="button" value="Carrito" >Carrito</a></td>
                        </tr>
                        <!-- Dirección pt.2 -->
                        <tr>
                            <td colspan="2"><label for="direccion-numero"><strong>Numero: </strong><?php echo $_SESSION['num'];?></label></td>
                            <td colspan="2"><label for="direccion-cp"><strong>CP: </strong><?php echo $_SESSION['cp'];?></label></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="celular"><strong>Celular: </strong><?php echo $_SESSION['cel'];?></label></td>
                            <td colspan="2"><label for="correo"><strong>Email: </strong><?php echo $_SESSION['email'];?></label></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><label for="usuario"><strong>Usuario: </strong><?php echo $_SESSION['user'];?></label></td>
                        </tr>
                        <tr><td></td></tr><tr><td></td></tr>
                        <tr>
                            <td colspan="3" align="right">
                                <?php echo "<a href=\"#acepted_" . $_SESSION["id"] . "\" class=\"btn btn-info btn-large btn-danger\" data-toggle=\"modal\">Eliminar</a>";?>
                                <?php echo "<div class=\"modal fade\" id=\"acepted_" .$_SESSION["id"] . "\">"; ?>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!--Header-->
                                                <h4 class="motal-title">ELIMINAR CUENTA</h4>
                                            </div>
                                            <!--Contenido-->
                                            <div class="modal-body">
                                            <br>
                                                <table>
                                                    <tr align="center">
                                                        <td></td>
                                                        <td><strong>ADVERTENCIA !PELIGRO¡</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td></td>
                                                        <td>¿Estas seguro de eliminar tu cuenta?</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr><td><br></td></tr>
                                                    <tr></tr>
                                                    <tr align="center">
                                                        <td>
                                                            <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button></td>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <input type="button" name="acepted" class="btn btn-danger" onclick="window.location='-client_DELETE.php'" value="Eliminar">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td colspan="3" align="left"><input class="btn btn-warning" type="button" onclick="window.location='-client_modifier.php'" value="Modificar"></td>
                        </tr>
                    </table>
                <br>
		        </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-12 -->

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