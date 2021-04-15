<?php

$query_productos;

if(!isset($_GET['buscar'])&&!isset($_GET['filtro'])){

    //aquí se hace la consulta al azar
    $query_productos="SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.cantidad > 0 ORDER BY rand() LIMIT 8;";

}elseif (empty($_GET['buscar'])&&$_GET['filtro']==0){
    $query_productos="SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.cantidad > 0 ORDER BY rand();";
}elseif(!empty($_GET['buscar'])){
    
    $buscar=$_GET['buscar'];
    $grado_escolaridad= $_GET['filtro'];
    
    if($grado_escolaridad==0){
        $query_productos="SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.nombre LIKE '%".$buscar."%' AND PRODUCTO.cantidad > 0 ORDER BY nombre ASC"; 
    }else{
        $query_productos="SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.nombre LIKE '%".$buscar."%' AND PRODUCTO.gradoEscolaridad = $grado_escolaridad AND PRODUCTO.cantidad > 0 ORDER BY nombre ASC"; 
    }    
       
    
}else{
    //aquí buscamos random, pero con el filtro
    $grado_escolaridad= $_GET['filtro'];
    $query_productos="SELECT PRODUCTO.*, IMAGEPRODUCTO.name FROM PRODUCTO LEFT JOIN IMAGEPRODUCTO ON PRODUCTO.idProducto = IMAGEPRODUCTO.idProducto WHERE PRODUCTO.gradoEscolaridad = $grado_escolaridad AND PRODUCTO.cantidad > 0 ORDER BY rand() LIMIT 8;";
    
}


include 'vistas/db.php';


$info_index=mysqli_query($con,$query_productos);

    mysqli_close($con);
?>

<!-- Esto es el producto -->
<div class="row">
    <?php
    while($lista_productos=mysqli_fetch_array($info_index)){
        $img_producto="vistas/imageShop/";
    ?>
    <div class="col-lg-3 col-md-5 mb-3">
        <div class="card h-100" align="center" >
            <a href="#">
            <?php
            if ($lista_productos['name'] != null && $lista_productos['idProducto'] != null){ 
                $img_producto = $img_producto.$lista_productos['idProducto'].'_'.$lista_productos['name']; 
            } else{
                $img_producto = $img_producto.'producto.jpg'; 
            }
            ?>
            <img class="card-img-top" class="img-thumbnail" style="width:150px; height: auto;" src="<?php echo $img_producto; ?>" alt=""></img></a>
            <div class="card-body" align="left">
                <h4 class="card-title">
                    <?php $id = $lista_productos['idProducto']; $name = $lista_productos['nombre']; echo "<a href=\"vistas/visualizar_producto.php?id=$id\"> $name </a>";?>
                </h4>
                <h5>$<?php echo $lista_productos['precio']; ?></h5>
                <p class="card-text"><?php echo $lista_productos['descripcion']; ?></p>
            </div>
        </div>
    </div>
    <?php
}
    ?>
</div>
