<?php
 
include "db.php";
include "-sesion_on.php";

if(!$sesion_on){
    if (isset($_POST['login'])) {
        
        $username = $_POST['username'];
        $password = base64_encode($_POST['password']);

        $query = "SELECT * FROM USUARIO, DIRECCION WHERE USUARIO.usuario='$username' and USUARIO.idUsuario=DIRECCION.idUsuario";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo '<p class="error">Username or password is wrong!</p>';
        } else {
            $info = mysqli_fetch_array($result);
            if ($password==$info['contrasena']) {
                $query = "SELECT * FROM SUSPENSION WHERE idUsuario='".$info['idUsuario']."'";
                $result = mysqli_query($con, $query);
                $result = mysqli_fetch_array($result);
                if(!empty($result)){
                    header('Location: operaciones/r_warning.php');
                    exit;
                }else{
                    $query = "SELECT * FROM IMAGE WHERE idUsuario='".$info['idUsuario']."'";
                    $result = mysqli_query($con, $query);
                    if(!$result){$_SESSION['image'] = 'persona.png';}
                    else{ $res = mysqli_fetch_array($result); $_SESSION['image'] = $res['idUsuario'].'_'.$res['name'];}
                    $_SESSION['id'] = $info['idUsuario'];
                    $_SESSION['user'] = $info['usuario'];
                    $_SESSION['pass'] = $info['contrasena'];
                    $_SESSION['fname'] = $info['nombre'];
                    $_SESSION['lname'] = $info['apellido'];
                    $_SESSION['cel'] = $info['celular'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['type'] = $info['Type_user'];
                    $_SESSION['calle'] = $info['calle'];
                    $_SESSION['num'] = $info['numeroEdificio'];
                    $_SESSION['cp'] = $info['codigoPostal'];
                    $_SESSION['col'] = $info['colonia'];
                    if($_SESSION['type']==1){
                        header('Location: adminMaster/-master_menu.php');
                        exit;
                    }else if($_SESSION['type']==2){
                        $query = "SELECT * FROM ADMTIENDA WHERE idUsuario = '".$info['idUsuario']."'";
                        $res = mysqli_query($con, $query);
                        $res = mysqli_fetch_array($res);
                        $_SESSION['idAdmin'] = $res['idAdmTienda'];
                        $_SESSION['shop'] = $res['nombreTienda'];
                        $_SESSION['rfc'] = $res['rfc'];
                        $_SESSION['descripcion'] = $res['descripcion'];
                        header('Location: userAdmin/-admin_menu.php');
                        exit;
                    }else if($_SESSION['type']==3){

                        $queryCliente = "SELECT idCliente FROM CLIENTE WHERE idUsuario = '".$_SESSION['id']."'";
                        $ress = mysqli_query($con, $queryCliente);
                        $ress = mysqli_fetch_array($ress);
                        $_SESSION['idCliente'] = $ress['idCliente'];
                        header('Location: userClient/-client_self.php');
                        exit;
                    }
                    echo '<p class="success">Congratulations, you are logged in!</p>';
                }
            } else {
                echo '<p class="error">Username or password is wrong!</p>';
            }
        }
    }else if (isset($_POST['recuperacion'])) {
        include 'db.php';
        $to = "unison.prueba20@gmail.com";
        $subject = "SPP-C19 - SOLICITUD DE RECUPERACIÓN DE CONTRASEÑA.";
        $message = $_POST['dato'];
        $success = mail($to, $subject, $message);
        if($success){
            header('Location: operaciones/r_warning.php');
            exit;
        }else{
            header('Location: operaciones/r_warning.php');
            exit;
        }
        mysqli_close($con);
    }
}else{
    if($_SESSION['type']==1){
        header('Location: adminMaster/-master_menu.php');
        exit;
    }else if($_SESSION['type']==2){
        header('Location: userAdmin/-admin_menu.php');
        exit;
    }else if($_SESSION['type']==3){
        header('Location: userClient/-client_self.php');
        exit;
    }
}

mysqli_close($con);

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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Menú</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="-login.php">Iniciar Sesión
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="-register.php">Registrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <hr>
    <div style="width:100%;  flex-grow: 1;" class="container">


        <div class="col-lg-12">
            <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                    <!-- Inicio de sesión -->
                    <div class="image-logo" align="center">
                        <img src="imageAdmin/-logo.jpg" height="100px"></img>
                    </div>
                    <br>
                    <form method="post" name="login">
                        <h3 align="center">Iniciar Sesión</h3>
                        <table class="table">
                            <tr>
                                <td> <label for="inicio_usuario">Usuario</label></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" id="inicio_usuario" name="username" placeholder="Tu usuario o email" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="inicio_contraseña">Contraseña</label></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="password" id="inicio_contraseña" name="password" placeholder="Tu contraseña" required></td>
                            </tr>
                            <tr>
                                <td align="center"><input class="btn btn-success" type="submit" name="login" value="Iniciar Sesión"></td>
                            </tr>

                        </table>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5" align="center">
                <a href="#modal1" class="btn btn-info btn-large disabled" data-toggle="modal">Recuperación</a>
                <!--Ventana emergente Detalles-->
                <div class="modal fade" id="modal1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" name="recuperacion">
                                <div class="modal-header">
                                    <!--Header-->
                                    <h4 class="motal-title">Recuperación de usuario</h4>
                                    <button align="right" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <!--Contenido-->
                                <div class="modal-body">Escriba el correo electrónico o teléfono del usuario a recuperar
                                    <br><br><br>
                                    <input placeholder="email o teléfono" type="text" class="form-control" name="dato"><br><br>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                                    <button class="btn btn-success" type="submit" name="recuperacion">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5"><p align="left">Correo de sugerencias: unison.prueba20@gmail.com</p></div>
            <div class="col-md-2"></div>
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

</body></html>