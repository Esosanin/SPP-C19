<?php
#echo "Estableciendo conexion... <hr />";
$con = mysqli_connect("localhost", "root", "", "epiz_26764821_SPP_C19");
if (!$con){
    die("Connection failed: " . mysqli_connect_error());
}

#mysqli_set_chartset($con, "utf8mb4");

?>