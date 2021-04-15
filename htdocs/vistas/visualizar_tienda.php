<?php

include "-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

include 'info_tienda_cliente.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SP-C19 - Papelerias online</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body style="display: flex; flex-direction: column;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SPP - C19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                include "-header.php";
                ?>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">
        <!--  Visualizar tienda  -->
        <div class="row">
            <div class="col-4">
                <div class="jumbotron" align="center">
                    <h4 align="center"><?php echo $nombre_tienda; ?></h4>
                    <br>
                    <?php $src = $d_imagen_tienda."-logo.jpg"; if($imageAdm!=null){$src = $d_imagen_tienda.$idUsuario.'_'.$imageAdm;}?>
                    <img  src="<?php echo $src; ?>" style='width:250px; height: auto;' class="img-thumbnail">
                    <br><br>
                    <h4 align="center"><?php if ($calificacion >= 0) {echo $calificacion;}else{echo '?';}?>/5</h4>
                    <?php
                    if ($calificacion > 0){
                        $des = round($calificacion) - $calificacion;
                        if ($des < 0){
                            $des = $des + 1;
                        }
                        if (round($calificacion) > 0){
                            if(round($calificacion) >= 1 || $des >= .75){
                                echo "<img src='imageProduct/star_2.png' class='img' style='width:40px; height: auto;'>";
                            }elseif ($des >= .25 || $des < .75){
                                echo "<img src='imageProduct/star_1.png' class='img' style='width:40px; height: auto;'>";
                            }else{
                                echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                            }
                        }
                        if (round($calificacion) > 1){
                            if(round($calificacion) >= 2 || $des >= .75){
                                echo "<img src='imageProduct/star_2.png' class='img' style='width:40px; height: auto;'>";
                            }elseif ($des >= .25 || $des < .75){
                                echo "<img src='imageProduct/star_1.png' class='img' style='width:40px; height: auto;'>";
                            }else{
                                echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                            }
                        }
                        if (round($calificacion) > 2){
                            if(round($calificacion) >= 3 || $des >= .75){
                                echo "<img src='imageProduct/star_2.png' class='img' style='width:40px; height: auto;'>";
                            }elseif ($des >= .25 || $des < .75){
                                echo "<img src='imageProduct/star_1.png' class='img' style='width:40px; height: auto;'>";
                            }else{
                                echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                            }
                        }
                        if (round($calificacion) > 3){
                            if(round($calificacion) >= 4 || $des >= .75){
                                echo "<img src='imageProduct/star_2.png' class='img' style='width:40px; height: auto;'>";
                            }elseif ($des >= .25 || $des < .75){
                                echo "<img src='imageProduct/star_1.png' class='img' style='width:40px; height: auto;'>";
                            }else{
                                echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                            }
                        }
                        if (round($calificacion) > 4){
                            if(round($calificacion) == 5 || $des >= .75){
                                echo "<img src='imageProduct/star_2.png' class='img' style='width:40px; height: auto;'>";
                            }elseif ($des >= .25 || $des < .75){
                                echo "<img src='imageProduct/star_1.png' class='img' style='width:40px; height: auto;'>";
                            }else{
                                echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                            }
                        }
                    }else{
                        echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                        echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                        echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                        echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                        echo "<img src='imageProduct/star_0.png' class='img' style='width:40px; height: auto;'>";
                    }
                    ?>
                    <br>
                    <br>
                    <h6 align="left">Descripción:</h6><p align="left">
                    <?php
                    
                    echo $descripcion_tienda;
                    
                    ?>
                    </p>
                </div>
            </div>
            <div class="col-8">
                <br><br>
                <h5>Ultimos productos</h5>

                <div class="row">

                    <?php
                    while($fila_productos=mysqli_fetch_array($info_productos)){
                    ?>
                    <?php
                    $image = $d_imagen_producto."producto.jpg";
                    if ($fila_productos['name']!=null){
                        $image = $d_imagen_producto.$fila_productos['idProducto'].'_'.$fila_productos['name'];
                    }
                    ?>
                    <div class="col-lg-4">
                        <div class="card h-100" align="center">
                            <a href="#"><img style='width:150px; height: auto;' class="card-img-top" src="<?php echo $image; ?>" alt=""></a>
                            <div class="card-body"  align="left">
                                <h4 class="card-title">
                                    <a href="<?php echo 'visualizar_producto.php?id='.$fila_productos['idProducto']; ?>"><?php echo $fila_productos['nombre']; ?></a>
                                </h4>
                                <h5>$<?php echo $fila_productos['precio']; ?></h5>
                                <p class="card-text">
                                    <?php echo $fila_productos['descripcion']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        
                    }
                    
                    ?>

                </div>
            </div>
        </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


</html>
