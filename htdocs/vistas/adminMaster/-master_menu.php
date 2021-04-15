<?php
include "../-sesion_on.php";
if(!$sesion_on){
    header('Location: ../-login.php');
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
      
      <?php include '-header.php'; ?>

    </div>
  </nav>

  <!-- Page Content -->
	<hr>
  <div style="width:100%;  flex-grow: 1;" class="container">

      <div class="col-lg-12">
				<div class="row">
		 <div class="col-md-12">

			<!-- Menú -->

			<h3>Menú</h3>
      
        <div class="image-logo" align="center">
            <img src="../imageAdmin/-logo.jpg" width="250px" height="250px"></img>
        </div>
      <br>
			
      <table class="table" >
				<!-- Botones -->
				<tr>
					<td align="center"><input class="btn btn-success" type="button" value="Listado Tiendas" onclick="window.location='-master_shoplist.php'">
					</td>
          <td></td>
					<td align="center">
						<input class="btn btn-success" type="button" value="Solicitudes" onclick="window.location='-master_request.php'">
					</td>
          <td></td>
          <td align="center">
            <input class="btn btn-success" type="button" value="Listado Usuarios" onclick="window.location='-master_userlist.php'">
          </td>
				</tr>
      </table>
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