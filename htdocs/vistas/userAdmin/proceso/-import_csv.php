<?php
include "proceso/fecha.php";
if(isset($_POST['import'])){
    $idAdm = $id;
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
            $query = "SELECT * FROM PRODUCTO WHERE idAdmTienda = '".$idAdm."'";
            $res = mysqli_query($con, $query) or die("database error:". mysqli_error($con));
            if(!$res){
                header("Location: r_error.php");
                exit;
            }else{
                $res = mysqli_fetch_array($res);
                while(($dato = fgetcsv($csv_file)) !== FALSE){
                    if($res['nombre']==$dato[0]) {
                        $update = "UPDATE `PRODUCTO` SET `descripcion`='".$dato[1]."',`precio`='".$dato[2]."',`cantidad`='".$dato[3]."',`gradoEscolaridad`='".$dato[4]."' WHERE idAdmTienda='".$idAdm."' AND `nombre`='".$dato[0]."'";
                        mysqli_query($con, $update) or die("database error:". mysqli_error($con));
                    } else{
                        $insert = "INSERT INTO `PRODUCTO` (`idAdmTienda`, `nombre`, `descripcion`, `precio`, `cantidad`, `gradoEscolaridad`, `fechaRegistro`)VALUES('".$idAdm."', '".$dato[0]."', '".$dato[1]."', '".$dato[2]."', '".$dato[3]."', '".$dato[4]."', '".$fecha."')";
                        mysqli_query($con, $insert) or die("database error:". mysqli_error($con));
                    }
                }
            }
            fclose($csv_file);
        }else{
            header("Location: r_error.php");
            exit;
        }
    }else{
        header("Location: r_error.php");
        exit;
    }
}

?>