<?php

include '../db.php';

if(!$con){
    
    ?>
    <html>
    <body>
        <p><?php echo substr($_FILES['imagen']['type'], 6);?></p>
    </body>
    </html>
    <?php
}else{

    include 'registro/fecha.php';//este es para encontrar la fecha de registro

    //variables de usuario
    $id;
    $nombre = $_POST['registro_nombre'];
    $apellido = $_POST['registro_apellido'];
    $celular = $_POST['registro_celular'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $email = $_POST['registro_correo'];
    $usuario = $_POST['Registro_usuario'];
    $pass = base64_encode($_POST['registro_contraseña']);
    $fechaRegistro=$fecha;

    //variables de dirección
    $calle = $_POST['registro_calle'];
    $numero = $_POST['registro_numero'];
    $colonia = $_POST['registro_colonia'];
    $cp = $_POST['registro_cp'];

    //variables de Admin Tiendas
    $nombreTienda = $_POST['registro_nombre_tienda'];
    $rfc = $_POST['registro_rfc'];
    $descripcion = $_POST['registro_descripcion_tienda'];

    if($tipo_usuario == 2){
        include 'registro/admshop.php';
    }else if($tipo_usuario == 3){
        include 'registro/client.php';
    }

    mysqli_close($con);
}
?>