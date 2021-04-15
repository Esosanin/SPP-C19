<?php

//se hace el insert de dirección
$insertar_direccion = "INSERT INTO `DIRECCION`(`idUsuario`, `calle`, `numeroEdificio`, `codigoPostal`, `colonia`) VALUES ('$id', '".$dato['calle']."', '".$dato['numeroEdificio']."', '".$dato['codigoPostal']."', '".$dato['colonia']."');";

$resultado = mysqli_query($con, $insertar_direccion);

if(!$resultado){echo 'NO SE INSERTO';}else{echo 'SI SE LOGRO';}

#mysqli_query($conn,$insertar_direccion);
?>