<?php

include "../-sesion_on.php";
if(!$sesion_on){
    header('Location: ../-login.php');
    exit;
}

if(isset($_POST['modificar'])){
    include '../db.php';
    $query="SELECT * FROM USUARIO WHERE usuario = '".$_POST['usuario_propietario']."'";
    $res = mysqli_query($con, $query);
    if(!$res){
        $query = "SELECT * FROM USUARIO WHERE usuario = '".$_POST['usuario_propietario']."' AND idUsuario = ".$_SESSION['id'];
        $res = mysqli_query($con, $query);
        if(!$res){
            $clave = base64_encode($_POST['clave_propietario']);
            $query="UPDATE `USUARIO` SET `usuario`='".$_POST['usuario_propietario']."', `contrasena`='".$clave."' WHERE `idUsuario`=".$_SESSION['id'];
            $res = mysqli_query($con, $query);
            if(!$res){
                header("Location: procesos/r_error.php");
                exit;
            }else{
                header("Location: -master_self.php");
                exit;
            }
        }else{
            header("Location: procesos/r_error.php");
            exit;
        }
    }else{
        $clave = base64_encode($_POST['clave_propietario']);
        $query="UPDATE `USUARIO` SET `usuario`='".$_POST['usuario_propietario']."', `contrasena`='".$clave."' WHERE `idUsuario`=".$_SESSION['id'];
        $res = mysqli_query($con, $query);
        if(!$res){
            header("Location: procesos/r_error.php");
            exit;
        }else{
            $_SESSION['user'] = $_POST['usuario_propietario'];
            $_SESSION['pass'] = $clave;
            header("Location: -master_self.php");
            exit;
        }
    }
    
    myslqi_close($con);
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
                    <div class="image-logo" align="left"><img src="../imageAdmin/-logo.jpg" heigth="100px" width="100px"></div>
                    <br>
                        <table clase="table" width="75%" align="center" cellspacing="3" cellpadding="10">
                            <!-- Comienza Perfil y foto -->
                            <tr>
                                <td>
                                    <h3>Modificar Perfil</h3>
                                </td>
                            </tr>
                    <form name="modificar" method="post">
                        <table class="table">
                            <tr>
                                <td>Usuario: <input name="usuario_propietario" class="form-control" type="text" placeholder="Nuevo usuario" value="<?php echo $_SESSION['user'];?>"></td>
                                <td>Contraseña: <input name="clave_propietario" class="form-control" type="password" placeholder="Nueva contraseña" value="<?php echo base64_decode($_SESSION['pass']);?>"></td>
                            </tr>
                            <tr>
                                <td><a href="-master_self.php" type="button" class="btn btn-danger" name="btn_cancelar">Cancelar</a></td>
                                <td><input type="submit" class="btn btn-success" value="Continuar" name="modificar"></td>
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
