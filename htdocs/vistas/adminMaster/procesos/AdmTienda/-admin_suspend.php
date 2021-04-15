<?php

$query = "SELECT * FROM SUSPENSION WHERE idUsuario = '$id'";
$res = mysqli_query($con, $query);
if(!$res){
        header("Location: procesos/r_error.php");
        exit;
}else{
    $info = mysqli_fetch_array($res);
    if (empty($info['idSuspension'])){
        $query = "INSERT INTO `SUSPENSION`(`idUsuario`, `fechaComienzo`, `fechaTerminar`) VALUES ('$id', '$comienzo', '$finalizacion')";
        $res = mysqli_query($con, $query);
        if(!$res){
            header("Location: procesos/r_error.php");
            exit;
        }else{
            header("Location: procesos/r_congratulate.php");
            exit;
        }
    }else{
        $dato = $info['idSuspension'];
        $query = "UPDATE `SUSPENSION` SET `fechaComienzo`='$comienzo',`fechaTerminar`='$finalizacion' WHERE `idSuspension`='$dato' AND `idUsuario`='$id'";
        $res = mysqli_query($con, $query);
        if(!$res){
            header("Location: procesos/r_error.php");
            exit;
        }else{
            header("Location: procesos/r_congratulate.php");
            exit;
        }
    }
}

?>