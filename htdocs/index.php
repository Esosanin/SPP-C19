<?php

include "vistas/-sesion_on.php";
if(!$sesion_on){
    header("Location: vistas/-login.php");
    exit;
}

 $v4='';
 $v0='';
 $v1='';
 $v2='';
 $v3='';
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
    <link href="vistas/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="vistas/css/shop-homepage.css" rel="stylesheet">

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
    <div  style="width:100%;  flex-grow: 1;" class="container">

        <br>
        <dv class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-8">

                        <?php
                        if(!isset($_GET['buscar'])&!isset($_GET['filtro'])){
                            
                            $buscado='';
                            
                        }else{
                            $buscado=$_GET['buscar'];
                            $filtrado=$_GET['filtro'];
                            
                            switch ($filtrado) {
                            case 0:
                                $v0='selected';
                                break;
                            case 1:
                                 $v1='selected';
                                break;
                            case 2:
                                 $v2='selected';
                                break;
                            case 3:
                                 $v3='selected';
                                break;
                            case 4:
                                 $v4='selected';
                                break;
                                }
                            
                        }
                        
                       ?>

                        <form action="" method="get">
                            <div class="row">

                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input name="buscar" type="text" class="form-control" placeholder="Buscar..." value="<?php echo $buscado; ?>">
                                        <div class="input-group-append">
                                            <a href="index.php"><button class="btn btn-secondary">Buscar</button></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <select name="filtro" class="btn btn-secondary">
                                        <option <?php echo $v0; ?> value="0">General</option>
                                        <option <?php echo $v1; ?> value="1">Primaria</option>
                                        <option <?php echo $v2; ?> value="2">Secundaria</option>
                                        <option <?php echo $v3; ?> value="3">Preparatoria</option>
                                        <option <?php echo $v4; ?> value="4">Universidad</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="col-4">

                        <a href="vistas/userClient/carrito.php"><button onclick="location.href='https://www.facebook.com" class="btn btn-secondary">Carrito de compras</button></a>

                    </div>
                </div>
            </div>
        </dv>

    </div>


    <div class="container">
        <div class="col-12">
            <br><br>
            <?php
            
            include 'info_index.php';
            
            ?>
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
    <script src="vistas/vendor/jquery/jquery.min.js"></script>
    <script src="vistas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
