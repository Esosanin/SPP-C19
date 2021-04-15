<?php

include "../-sesion_on.php";
if(!$sesion_on){
    header('Location: ../-login.php');
    exit;
}

if(isset($_POST['editar'])){
    include '../db.php';
    $query="SELECT * FROM USUARIO WHERE usuario = '".$_POST['user']."'";
    $res = mysqli_query($con, $query);
    $clave = base64_encode($_POST['pass']);
    
    if(!$res){
        $res = mysqli_fetch_array($res);
        if($res['idUsuario'] == $_SESSION['id']){
            $query="UPDATE `USUARIO` SET `nombre`='".$_POST['nombre']."',`apellido`='".$_POST['apellido']."',`celular`='".$_POST['cel']."',`email`='".$_POST['email']."',`usuario`='".$_POST['user']."',`contrasena`='".$clave."' WHERE `idUsuario`=".$_SESSION['id'];
            $res = mysqli_query($con, $query);
            if(!$res){
                header("Location: r_error.php");
                exit;
            }else{
                $query="UPDATE `DIRECCION` SET `calle`='".$_POST['calle']."',`numeroEdificio`='".$_POST['num']."',`codigoPostal`='".$_POST['cp']."',`colonia`='".$_POST['col']."' WHERE `idUsuario`=".$_SESSION['id'];
                $res = mysqli_query($con, $query);
                if(!$res){
                    header("Location: r_error.php");
                    exit;
                }else{
                    $desc = '';
                    if(!empty($_POST['descripcion'])){$desc=$_POST['descripcion'];}else{$desc=$_SESSION['descripcion'];}
                    $query="UPDATE `ADMTIENDA` SET `nombreTienda`='".$_POST['shop']."',`rfc`='".$_POST['rfc']."',`descripcion`='".$desc."' WHERE `idUsuario`=".$_SESSION['id']." AND `idAdmTienda`=".$_SESSION['idAdmin'];
                    $res = mysqli_query($con, $query);
                    if(!res){
                        header("Location: r_error.php");
                        exit;
                    }else{
                        $id=$_SESSION['id'];
                        $dato=$_SESSION['imagen'];
                        
                        include "proceso/sube.php";

                        $_SESSION['user'] = $_POST['user'];
                        $_SESSION['pass'] = $clave;
                        $_SESSION['fname'] = $_POST['nombre'];
                        $_SESSION['lname'] = $_POST['apellido'];
                        $_SESSION['cel'] = $_POST['cel'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['calle'] = $_POST['calle'];
                        $_SESSION['num'] = $_POST['num'];
                        $_SESSION['cp'] = $_POST['cp'];
                        $_SESSION['col'] = $_POST['col'];
                        $_SESSION['shop'] = $_POST['shop'];
                        $_SESSION['rfc'] = $_POST['rfc'];
                        $_SESSION['descripcion'] = $_POST['descripcion'];
                        $_SESSION['image'] = $dato;
                        header("Location: -admin_self.php");
                        exit;
                    }
                }
            }
        }else{
            header("Location: r_error.php");
            exit;
        }
    }else{
        $query="UPDATE `USUARIO` SET `nombre`='".$_POST['nombre']."',`apellido`='".$_POST['apellido']."',`celular`='".$_POST['cel']."',`email`='".$_POST['email']."',`usuario`='".$_POST['user']."',`contrasena`='".$clave."' WHERE `idUsuario`=".$_SESSION['id'];
        $res = mysqli_query($con, $query);
        if(!$res){
            header("Location: r_error.php");
            exit;
        }else{
            $query="UPDATE `DIRECCION` SET `calle`='".$_POST['calle']."',`numeroEdificio`='".$_POST['num']."',`codigoPostal`='".$_POST['cp']."',`colonia`='".$_POST['col']."' WHERE `idUsuario`=".$_SESSION['id'];
            $res = mysqli_query($con, $query);
            if(!$res){
                header("Location: r_error.php");
                exit;
            }else{
                $query="UPDATE `ADMTIENDA` SET `nombreTienda`='".$_POST['shop']."',`rfc`='".$_POST['rfc']."',`descripcion`='".$_POST['descripcion']."' WHERE `idUsuario`=".$_SESSION['id']." AND `idAdmTienda`=".$_SESSION['idAdmin'];
                $res = mysqli_query($con, $query);
                if(!$res){
                    header("Location: r_error.php");
                    exit;
                }else{
                    $id=$_SESSION['id'];
                    $dato=$_SESSION['image'];
                    
                    include "proceso/sube.php";
                    
                    $_SESSION['user'] = $_POST['user'];
                    $_SESSION['pass'] = $clave;
                    $_SESSION['fname'] = $_POST['nombre'];
                    $_SESSION['lname'] = $_POST['apellido'];
                    $_SESSION['cel'] = $_POST['cel'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['calle'] = $_POST['calle'];
                    $_SESSION['num'] = $_POST['num'];
                    $_SESSION['cp'] = $_POST['cp'];
                    $_SESSION['col'] = $_POST['col'];
                    $_SESSION['shop'] = $_POST['shop'];
                    $_SESSION['rfc'] = $_POST['rfc'];
                    $_SESSION['descripcion'] = $_POST['descripcion'];
                    $_SESSION['image'] = $dato;
                    header("Location: -admin_self.php");
                    exit;
                }
            }
        }
    }
    
    mysqli_close($con);
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
                    <div class="image-logo" align="left"><img src="../imageAdmin/-logo.jpg" height="100px" width="100px"></div>
                    <br>
                    <form method="post" name="editar" enctype="multipart/form-data">
                        <table clase="table" width="75%" align="center" cellspacing="3" cellpadding="10">
                            <!-- Comienza Perfil y foto -->
                            <tr>
                                <td colspan="5">
                                    <h3>Modificar del Perfil</h3><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img height="100px" width="100px" id="imagenPrevisualizacion"><!--   Aquí va la imagen, está limitada en tamaño a 100px     -->
                                </td>
                                <td colspan="4" align="left">
                                    <input class="btn" type="file" id="imagen" name="imagen" accept="image/jpeg">
                                </td>
                            </tr>
                            <!-- Comienza nombre, apellido y boton -->
                            <tr>
                                <td colspan="2"><label for="nombre_tienda"><strong>Nombre de la tienda: </strong></label><input name="shop" class="form-control" type="text" placeholder="Nombre de la Tienda" value="<?php echo $_SESSION['shop'];?>" maxlength="50" required></td>
                                <td colspan="2"><label for="nombre"><strong>Nombre: </strong></label><input name="nombre" class="form-control" type="text" placeholder="Su nombre" value="<?php echo $_SESSION['fname'];?>"  maxlength="50" required></td>
                                <td colspan="2"><label for="apellido"><strong>Apellido: </strong></label><input name="apellido" class="form-control" type="text" placeholder="Su apellido" value="<?php echo $_SESSION['lname'];?>"  maxlength="50" required></td>
                            </tr>
                            <!-- Dirección -->
                            <tr>
                                <td><label for="direccion"><h4>Dirección</h4></label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- Dirección -->
                            <tr>
                                <td colspan="2"><label for="direccion-calle"><strong>Calle: </strong></label><input name="calle" class="form-control" type="text" placeholder="Calle" value="<?php echo $_SESSION['calle'];?>" maxlength="50" required></td>
                                <td colspan="2"><label for="direccion-numero"><strong>Numero: </strong></label><input name="num" class="form-control" type="text" placeholder="Numero exterior del edificio." value="<?php echo $_SESSION['num'];?>"  maxlength="3" required></td>
                                <td colspan="2"><label for="direccion-cp"><strong>CP: </strong></label><input name="cp" class="form-control" type="text" placeholder="Codigo Postal." value="<?php echo $_SESSION['cp'];?>" maxlength="7" required></td>
                            </tr>
                            <!-- Descripción -->
                            <tr>
                                <td colspan="2"><label for="colonia_tienda"><strong>Colonia: </strong></label><input name="col" class="form-control" type="text" placeholder="Colonia." value="<?php echo $_SESSION['col'];?>"  maxlength="50" required></td>
                                <td colspan="2"><label for="celular"><strong>Celular: </strong></label><input name="cel" class="form-control" type="text" placeholder="Numero Telefonico o de Celular." value="<?php echo $_SESSION['cel'];?>" maxlength="15" required></td>
                                <td colspan="2"><label for="correo_tienda"><strong>Email: </strong></label><input name="email" class="form-control" type="text" placeholder="Correo electronico." value="<?php echo $_SESSION['email'];?>"  maxlength="50" required></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2"><label for="rfc"><strong>RFC: </strong></label><input name="rfc" class="form-control" type="text" placeholder="RFC" value="<?php echo $_SESSION['rfc'];?>"></td>
                                <td colspan="4" rwospan="2"><label for="descripcion_tienda"><strong>Descripción: </strong></label><textarea name="descripcion" class="form-control" minlength="50" maxlength="255" type="text" placeholder="Descripción de la tienda."><?php echo $_SESSION['descripcion'];?></textarea></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td colspna="2"><label for="usuario"><strong>Usuario: </strong></label><input name="user" class="form-control" type="text" placeholder="Nombre de usuario. (Apodo)" value="<?php echo $_SESSION['user'];?>"  maxlength="35" required></td>
                                <td colspan="2"></td>
                                <td colspan="2"><label for="contraseña"><strong>Contraseña: </strong></label><input name="pass" class="form-control" type="password" placeholder="Contraseña" value="<?php echo base64_decode($_SESSION['pass']);?>" maxlength="32" required></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="left"><input class="btn btn-danger" type="button" onclick="window.location='-admin_self.php'" value="Cancelar"></td>
                                <td colspan="3" align="left"><input class="btn btn-warning" type="submit" value="Continuar" name="editar"></td>
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
