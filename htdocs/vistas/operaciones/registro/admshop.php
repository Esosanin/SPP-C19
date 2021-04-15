<?php
$query = "SELECT usuario FROM USUARIO WHERE usuario='$usuario'";
$res = mysqli_query($con, $query);
$dato = mysqli_fetch_array($res);
if(!$dato){
    //se hace el insert del usuario
    $insertar = "INSERT INTO `SOLICITUDES`(`nombreTienda`, `nombre`, `apellido`, `calle`, `numeroEdificio`, `codigoPostal`, `colonia`, `celular`, `email`, `Type_user`, `usuario`, `contrasena`, `rfc`, `descripcion`, `fechaRegistro`) VALUES ('$nombreTienda', '$nombre', '$apellido', '$calle', '$numero', '$cp', '$colonia', '$celular', '$email', '$tipo_usuario', '$usuario', '$pass', '$rfc', '$descripcion', '$fechaRegistro');";
    $resultado = mysqli_query($con, $insertar);

    if (!$resultado){  
        header('Location: r_error.php');
        exit;
    }else{
        header('Location: r_wait_register_shop.php');
        exit;
    }
}else{
    header('Location: r_error.php');
    exit;
}
?>