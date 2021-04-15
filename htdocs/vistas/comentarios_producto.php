<div class="row">
<div class="col-1"></div>
<div class="col-10">
<table width="100%" class="table table-striped">
    <tr>
        <th colspan="5" >
            <h4>Comentarios</h4>
        </th>
    </tr>
    <?php
    $o = 0;
    while($o < $i){
    ?>
    <tr align="center">
        <td width="10%">
            #<?php echo $array[$o + 1]['cliente']; ?>
        </td>
        <td width="20%">
            <?php
            if ($array[$o + 1]['puntos'] != 0){
                $des = round($array[$o + 1]['puntos']) - $array[$o + 1]['puntos'];
                if ($des < 0){
                    $des = $des + 1;
                }
                if (round($array[$o + 1]['puntos']) > 0){
                    echo "<img src='imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
                }else{
                    echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                }
                if (round($array[$o + 1]['puntos']) > 1){
                    echo "<img src='imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
                }else{
                    echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                }
                if (round($array[$o + 1]['puntos']) > 2){
                    echo "<img src='imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
                }else{
                    echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                }
                if (round($array[$o + 1]['puntos']) > 3){
                    echo "<img src='imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
                }else{
                    echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                }
                if (round($array[$o + 1]['puntos']) > 4){
                    echo "<img src='imageProduct/star_2.png' class='img' style='width:20px; height: auto;'>";
                }else{
                    echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                }
            }else{
                echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
                echo "<img src='imageProduct/star_0.png' class='img' style='width:20px; height: auto;'>";
            }
            ?>
            &nbsp;&nbsp;
            <?php
            echo $array[$o + 1]['puntos'];?>/5 
        </td>
        <td width="70%" align="left" colspan="3">
            <?php echo $array[$o + 1]['desc']; ?>
        </td>
    </tr>

    <?php
    $o+=1;
    }
    ?>
</table>
</div>
<div class="col-1"></div>
</div>
