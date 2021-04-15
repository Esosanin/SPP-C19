<?php

$query_Factura = "DELETE FROM `FACTURA` WHERE `idFactura`='".$id."'";
$resultado_query = mysqli_query($con, $query_Factura);
if(!$resultado_query){
    header('Location: r_error.php');
    exit;
}


?>