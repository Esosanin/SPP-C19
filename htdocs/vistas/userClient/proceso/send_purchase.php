<?php
include "../db.php";
include "proceso/fecha.php";

$query = "SELECT CARRITO.*, PRODUCTO.cantidad as Cantidad, PRODUCTO.precio as Precio FROM CARRITO, PRODUCTO WHERE CARRITO.idProducto = PRODUCTO.idProducto AND CARRITO.idTienda = PRODUCTO.idAdmTienda AND CARRITO.idCliente = '$id'";
$res = mysqli_query($con, $query);
if(!$res){
    header("Location: r_error.php");
    exit;
}else{

    $query = "SELECT * FROM PEDIDOCARRITO WHERE idCliente = '".$id."'";
    $resultado = mysqli_query($con, $query);
    $bandera_win = true;
    if(!$resultado){
        $bandera_win = false;
    }

    $status = 1;
    if ($type == 3){
        $status = 5;
    }

    while($row=mysqli_fetch_array($res)){
        $repetidor = $resultado;
        $cant = 0; $price = 0;
        $bandera = true;
        if ($bandera_win){
        while($fila=mysqli_fetch_array($repetidor)){
            if($fila['idProducto'] == $row['idProducto'] && $fila['idTienda'] == $row['idTienda']){
                $cant = $row['Cantidad'];
                if (($fila['cantidad'] + $row['cantidad']) < $row['Cantidad']){
                    $cant = $fila['cantidad'] + $row['cantidad'];
                }
                $price = $row['Precio'] * $cant;
                $query="UPDATE `PEDIDOCARRITO` SET `cantidad`='".$cant."',`precio`='".$price."' WHERE idCliente = '".$row['idCliente']."' AND idTienda = '".$row['idTienda']."' AND idProducto = '".$row['idProducto']."'";
                $result = mysqli_query($con, $query);
                if (!$result){
                    header("Location: r_error.php");
                    exit;
                }
                $bandera = false;
                break;
            }
        }
        }
        if($bandera){
            $query = "INSERT INTO `PEDIDOCARRITO`(`idCliente`, `idTienda`, `idProducto`, `cantidad`, `precio`, `fechaRegistro`) VALUES ('".$row['idCliente']."', '".$row['idTienda']."', '".$row['idProducto']."', '".$row['cantidad']."', '".$row['precio']."', '".$fecha."')";
            $ress = mysqli_query($con, $query);
            if (!$ress){
                header("Location: r_error.php");
                exit;
            }
        }
    }

    $query_AdminTienda = "SELECT idTienda, cantidad, precio FROM PEDIDOCARRITO WHERE idCliente = '".$id."'";
    $resultado_AdminTienda = mysqli_query($con,$query_AdminTienda);
    if (!$resultado_AdminTienda){
        header("Location: r_error.php");
        exit;
    }

    while ($datos_AdminTienda = mysqli_fetch_array($resultado_AdminTienda)){
        $query = "SELECT PEDIDO.idTienda, PEDIDO.idPedido, COUNT(PEDIDOCARRITO.cantidad) as cantidad, SUM(PEDIDOCARRITO.precio) as precio FROM PEDIDOCARRITO, PEDIDO WHERE PEDIDOCARRITO.idCliente = PEDIDO.idCliente AND PEDIDOCARRITO.idCliente = '".$id."' AND PEDIDOCARRITO.idTienda = PEDIDO.idTienda AND PEDIDOCARRITO.idTienda = '".$datos_AdminTienda['idTienda']."'";
        $res = mysqli_query($con, $query);
        $res = mysqli_fetch_array($res);
        if(empty($res['idPedido'])){ 
            $query = "INSERT INTO `PEDIDO`(`idCliente`, `idTienda`, `cantidad`, `precio`, `estatus`, `fechaRegistro`, `calle`, `numeroEdificio`, `codigoPostal`, `colonia`) VALUES ('$id', '".$datos_AdminTienda['idTienda']."', '".$datos_AdminTienda['cantidad']."', '".$datos_AdminTienda['precio']."', '$status','$fecha', '$calle', '$num', '$cp', '$col')";
        }else{
            $query = "UPDATE `PEDIDO` SET `cantidad`='".$res['cantidad']."',`precio`='".$res['precio']."', `estatus` = '$status' WHERE idPedido = '".$res['idPedido']."' AND idCliente = '".$id."' AND idTienda = '".$res['idTienda']."'";
        }
        $res = mysqli_query($con, $query);
    
        if(!$res){
            header("Location: r_error.php");
            exit;
        }
    }

    $delete = "DELETE FROM CARRITO WHERE idCliente = '".$id."'";
    $res = mysqli_query($con, $delete);
    if (!$res){
        header("Location: r_error.php");
        exit;
    }

    if($type == 2){
        header("Location: r_pedido.php");
        exit;
    }elseif($type == 3){
        header("Location: r_recoger.php");
        exit;
    }else{
        header("Location: r_error.php");
        exit;
    }
}

mysqli_close($con);
?>