<?php

include "-sesion_on.php";

if(!$sesion_on){
    header("Location: ../-login.php");
    exit;
}

include 'info_producto.php';

if(isset($_POST['comprar'])){
    $idProd = $idProducto;
    $idAdm = $id_tienda;
    $cant = $_POST['cantidad'];
    $idCliente = $_SESSION['idCliente'];
    $precio = $precio_producto;
    include "agregar_producto.php";
}

if(isset($_POST['comentar'])){
    $calif = $_POST['calif'];
    $comentario = $_POST['comentario'];
    $cliente = $_SESSION['idCliente'];
    $producto = $_GET['id'];
    include "agregar_comentario.php";
}


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

<body>

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
    <br>
    <div class="container">
        <div class="col-sm">
            <!--   Visualizar Producto    -->

            <div class="row">
                <div class="col-sm">
                    <div class="container">
                        <h2>
                            <?php
                            echo $nombre_producto;
                            ?>
                        </h2>


                        <br><br><br>

                        <h5>Descripción del producto</h5>
                        <h6>
                            <?php
                            echo $descripcion_producto;
                            ?>
                        </h6>

                        <br><br><br>
                        <h6>Grado de escolaridad:</h6>
                        <?php
                            echo $g_escolaridad_producto;
                            ?>
                    </div>
                    <br><br><br><br><br>
                    <div class="jumbotron">
                        <div class="row">
                        <div class="col-6">
                        <table>
                            <tr>
                                <td>
                                    <h6>Nombre de tienda</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><?php echo $nombre_tienda;?></h4>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Lo planeado es poner en href el link a el php de la tienda, pero agregrando echo '?id=$id_tienda;' -->
                                    <!-- De esa manera, nos redirigirá a la visualización de la tienda -->
                                    <a href="<?php echo 'visualizar_tienda.php?id='.$id_tienda; ?>" class="btn btn-info">Visitar tienda</a><!--  Aquí mismo  -->
                                </td>
                            </tr>
                        </table>
                        </div>
                        <div class="col-6">
                        <table>
                            <tr>
                                <td align = "center" rowspan="3">
                                    <h4>Calificación</h4>
                                    <br>
                                    <h4>
                                    <?php
                                    if($calificacion > 0){
                                        echo round($calificacion, 2);
                                    }else{
                                        echo "?";
                                    }
                                    ?>/5
                                    </h4>
                                    <br>
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
                                </td>
                            </tr>
                        </table>
                        </div></div>
                    </div>
                </div>
                <form method="post" name="comprar">
                <div class="col-sm">
                    <div class="jumbotron" align="center">
                        <a data-toggle="modal" href=""><img src="<?php echo $d_imagen_producto; ?>" style="width: 250px; height: auto;" class="img-thumbnail"></a>
                        <br><br>

                        <h6 align="left">Precio:</h6>
                        <h3 align="left">$
                            <?php
                            echo $precio_producto;
                            ?>
                        </h3>

                        <br><br>

                        <h6 align="left">Cantidad a pedir: <input  align="left" type="number" name="cantidad" value="1" max="<?php echo $cantidad;?>" min="1"></h6>

                        <br><br><br>

                        <input class="btn btn-success" type="submit" name="comprar" value="Agregar al carrito">
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    <!-- /.container -->

    <!--  Ahora haré un container para poder escribir los comentarios  -->
    <div class="jumbotron">
        <form method="post" name="comentar">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <table width="90%" align="center">
                        <tr>
                            <td>
                                <h4>Calificación: &nbsp;&nbsp;
                                    <select class="btn btn-info" name="calif">
                                    <option value="1" select>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <h4>Comentario</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea style="resize: none; width:100%; rows:2; maxlength:255; minlength:1;"  name="comentario"  placeholder="Tu comentario..."></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="submit" name="comentar" value="Enviar" class="btn btn-success">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-1"></div>
            </div>
        </form>
    </div>

    <div class="jumbotron">

        <?php
        include "comentarios_producto.php";
        ?>

    </div>

    <!-- Footer -->
    <hr>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>



<!-- Modal para visualizar imagen -->
<div class="modal fade" id="imagen">
    <div class="modal-dialog">
        <div class="modal-content">

            <img src="<?php echo $d_imagen_producto; ?>" style="width:700px; height: auto; ">

        </div>
    </div>
</div>

</html>
