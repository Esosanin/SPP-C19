<?php

if(isset($_POST['baja'])){
    include '../db.php';
    $id = $_POST['id'];
    include 'procesos/AdmTienda/-admin_baja.php';
    mysqli_close($con);
}

if(isset($_POST['suspender'])){
    include '../db.php';
    $id = $_POST['id'];
    $comienzo = $_POST['comienzo'];
    $finalizacion = $_POST['finalizacion'];
    include 'procesos/AdmTienda/-admin_suspend.php';
    mysqli_close($con);
}

if(isset($_POST['restore'])){
    include '../db.php';
    $id = $_POST['id'];
    include 'procesos/AdmTienda/-admin_restore.php';
    mysqli_close($con);
}

include "../db.php";
include "../-sesion_on.php";
if(!$sesion_on){
    header('Location: ../-login.php');
    exit;
}
$query = "SELECT USUARIO.*, ADMTIENDA.*, SUSPENSION.idSuspension FROM USUARIO, ADMTIENDA LEFT JOIN SUSPENSION ON ADMTIENDA.idUsuario = SUSPENSION.idUsuario WHERE ADMTIENDA.idUsuario = USUARIO.idUsuario";
#$query = "SELECT * FROM ADMTIENDA, USUARIO WHERE ADMTIENDA.idUsuario = USUARIO.idUsuario ORDER BY ADMTIENDA.idAdmTienda;";
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

            <?php include '-header.php'; ?>
            
        </div>
    </nav>

    <!-- Page Content -->
	<br>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <div class="col-lg-12">
			<div class="row">
		        <div class="col-md-12">
                <!-- Menú -->
                <h3>Listado de Tiendas</h3>
                <br>
                <!-- Tabla de Tiendas -->
                <table class="table">
                <tr align="center">
                    <th><label>Id</label></th>
                    <th><label>Nombre</label></th>
                    <th><label>RFC</label></th>
                    <th><label>Detalles</label></th>
                    <th><label>Suspender</label></th>
                    <th><label>Baja</label></th>
                    <th><label>Restaurar</label></th>
                    </tr>
				<?php
                    include 'procesos/AdmTienda/-admin_details.php';
                ?>
                </table>
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