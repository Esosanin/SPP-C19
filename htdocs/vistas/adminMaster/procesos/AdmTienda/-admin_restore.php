<?php

$query = "DELETE FROM SUSPENSION WHERE idUsuario = '$id'";
$res = mysqli_query($con, $query);

if(!$res){
    header("Location: procesos/r_error.php");
    exit;
}else{
    header("Location: procesos/r_congratulate.php");
    exit;
}

?>