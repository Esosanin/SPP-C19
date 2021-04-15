<?php

$query = "SELECT * FROM SOLICITUDES WHERE idSolicitudes='$idSolicitud'";
$res = mysqli_query($con, $query);
$dato = mysqli_fetch_array($res);
if(!$dato){
    header("Location: procesos/r_error.php");
    exit;
}else{
    //se hace el insert del usuario
    $insertar = "INSERT INTO `USUARIO`(`nombre`, `apellido`, `celular`, `email`, `Type_user`, `usuario`, `contrasena`, `fechaRegistro`) VALUES ('".$dato['nombre']."', '".$dato['apellido']."', '".$dato['celular']."', '".$dato['email']."', '".$dato['Type_user']."', '".$dato['usuario']."', '".$dato['contrasena']."', '".$dato['fechaRegistro']."');";
    $resultado = mysqli_query($con, $insertar);
    if (!$resultado){  
        header('Location: procesos/r_error.php');
        exit;
    }else{
        $query = "SELECT * FROM USUARIO WHERE usuario='".$dato['usuario']."'";
        $res = mysqli_query($con, $query);
        $datoUser = mysqli_fetch_array($res);
        if (!$dato){  
            header('Location: procesos/r_error.php');
            exit;
        }else{
            $id = $datoUser['idUsuario'];
            include 'guardar_direccion.php';
            include 'sube.php';
            include '-request_deleted.php';
            $insertar = "INSERT INTO `ADMTIENDA`(`idUsuario`, `nombreTienda`, `rfc`, `descripcion`) VALUES ('$id', '".$dato['nombreTienda']."', '".$dato['rfc']."', '".$dato['descripcion']."');";
            $resultado = mysqli_query($con, $insertar);
            if(!$resultado){
                header('Location: procesos/r_error.php');
                exit;
            }else{
                header('Location: procesos/r_congratulate.php');
                exit;
            }
        }
    }
}

?>