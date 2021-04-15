<?php

$query = "DELETE FROM SOLICITUDES WHERE idSolicitudes = '$idSolicitud'";
$res = mysqli_query($con, $query);

?>