<?php

$sql = "SELECT * FROM USUARIO";//query
$result = mysqli_query($con, $sql);//se envía y obtiene el result

while($info=mysqli_fetch_array($result)){
    //aquí es donde el result se convierte en un arreglo que se divide según el nombre de la clumna den la bd    
                
    $nombre = $info['nombre'];
    $apellido = $info['apellido'];
    $imagen = "archivos/".$info['idUsuario'].".jpg";//aquí llame al id porque la imagen tiene el mismo nombre que el id
                                                    //además, está guardada en archivos, una carpeta que está en el directorio principal
        ?>


<table>
    <tr>
        <td><?php echo $nombre ?></td><!--   Se imprime el nombre     -->
        <td><?php echo $apellido ?></td><!--   Se imprime el apellido     -->
        <td><img style="width:100px; height: auto;" src="<?php echo $imagen; ?>"></td><!--   muestra la imagen     -->

    </tr>
</table>


<?php
        }
?>