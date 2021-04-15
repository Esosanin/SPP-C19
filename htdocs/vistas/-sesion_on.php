<?php
session_start();
$sesion_on;
if(!isset($_SESSION['id'])){
    $sesion_on = false;
}else{
    $sesion_on = true;
}
?>