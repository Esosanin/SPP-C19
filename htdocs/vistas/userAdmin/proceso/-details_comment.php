<?php
include "../db.php";

$query_comment = "SELECT * FROM COMENTARIOS WHERE idTienda = '".$Tienda."'";
$res = mysqli_query($con, $query_comment);
if (!$res){
    header("Location: proceso/r_error.php");
    exit;
}

while ($row=mysqli_fetch_array($res)){
?>

<tr>
    <td width="12.5%" align="center">
        #<?php echo $row['0'];?>
    </td>
    <td width="12.5%" align="center">
        #<?php echo $row['1'];?>
    </td>
    <td width="12.5%" align="center">
        #<?php echo $row['3'];?>
    </td>
    <td width="12.5%" align="center">
        <?php 
        if ($row['4'] > 0){
            echo "<img src='../imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
        }else{
            echo "<img src='../imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
        }
        if ($row['4'] > 1){
            echo "<img src='../imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
        }else{
            echo "<img src='../imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
        }
        if ($row['4'] > 2){
            echo "<img src='../imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
        }else{
            echo "<img src='../imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
        }
        if ($row['4'] > 3){
            echo "<img src='../imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
        }else{
            echo "<img src='../imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
        }
        if ($row['4'] > 4){
            echo "<img src='../imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
        }else{
            echo "<img src='../imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
        }
        ?>
    </td>
    <td  width="25%" align="center">
        <?php echo $row['6'];?>
    </td>
    <td  width="25%" align="center">
        <?php echo "<a href=\"#Details_" . $row['0'] . "\" class=\"btn btn-info btn-large\" data-toggle=\"modal\">Detalles...</a>"; ?>
        <!--Ventana emergente Detalles-->
        <?php echo "<div id=\"Details_" . $row['0'] . "\" class=\"modal fade\" role=\"dialog\">";?>
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <!-- Contenido del Modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Header-->
                        <h4 class="modal-title">#<?php echo $row['0'];?> Comentario del Usuario #<?php echo $row['1'];?> al Producto #<?php echo $row['3'];?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table" width="80%">
                            <tr align="left">
                                <td>
                                    <?php
                                    echo $row['5'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo "<a href=\"#baja_" . $row['0'] . "\" class=\"btn btn-danger btn-large\" data-toggle=\"modal\">Baja</a>"; ?>
        <!--Ventana emergente Detalles-->
        <?php echo "<div id=\"baja_" . $row['0'] . "\" class=\"modal fade\" role=\"dialog\">";?>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <!-- Contenido del Modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Header-->
                        <h6 class="modal-title">Eliminar el comentario del Usuario #<?php echo $row['1'];?> al Producto #<?php echo $row['3'];?></h6>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="baja">
                            <div style="display:none;">
                                <input type="text" class="btn btn-danger" name="id" value="<?php echo $row['0']; ?>">
                            </div>
                            <table class="table" width="80%">
                                <tr align="left">
                                    <td align="left">
                                        <button type="button" data-dismiss="modal" class="btn btn-success">Cerrar</button>
                                    </td>
                                    <td align="right">
                                        <input type="submit" class="btn btn-danger" name="baja" value="Continuar">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
<?php
}
mysqli_close($con);
?>