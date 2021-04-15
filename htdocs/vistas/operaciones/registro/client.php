<?php

$query = "SELECT usuario FROM USUARIO WHERE usuario='$usuario'";
$res = mysqli_query($con, $query);
$dato = mysqli_fetch_array($res);
if(!$dato){
    //se hace el insert del usuario
    $insertar = "INSERT INTO `USUARIO`(`nombre`, `apellido`, `celular`, `email`, `Type_user`, `usuario`, `contrasena`, `fechaRegistro`) VALUES ('$nombre', '$apellido', '$celular', '$email', '$tipo_usuario', '$usuario', '$pass', '$fechaRegistro');";
    $resultado = mysqli_query($con, $insertar);

    if (!$resultado){  
        header('Location: r_error.php');
        exit;
    }else{
        $query = "SELECT * FROM USUARIO WHERE usuario='$usuario'";
        $res = mysqli_query($con, $query);
        $dato = mysqli_fetch_array($res);
        if (!$resultado){  
            header('Location: r_error.php');
            exit;
        }else{
            $id = $dato['idUsuario'];
            include 'guardar_direccion.php';
            include 'sube.php';
            $insertar = "INSERT INTO `CLIENTE`(`idUsuario`) VALUES ('$id');";
            $resultado = mysqli_query($con, $insertar);
            if(!$resultado){
                header('Location: r_error.php');
                exit;
            }else{
                header('Location: r_congratulate.php');
                exit;
            }
        }
    }
}else{
    header('Location: r_error.php');
    exit;
}


?>