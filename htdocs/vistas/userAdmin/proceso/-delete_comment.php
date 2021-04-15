<?php
$query = "DELETE FROM COMENTARIOS WHERE idComentario = '".$_POST['id']."'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}
?>