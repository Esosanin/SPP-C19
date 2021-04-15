<?php
$Act = basename($_SERVER['PHP_SELF']);
$cs = 'class=\"nav-item\"'; $vt = $cs; $cc = $vt;
$css; $vts; $ccs;
switch($Act)
{
    case "carrito.php":
    case "carrito.php#":
        $cc = 'class=\'nav-item active\'';
        $ccs = "<span class=\"sr-only\">(current)</span>"; 
    break;
    case "-client_self.php":
    case "-client_self.php#":
        $cs = 'class=\'nav-item active\'';
        $css = "<span class=\"sr-only\">(current)</span>";
    break;
    case "index.php":
    case "index#":
        $vt = 'class=\'nav-item active\'';
        $vts = "<span class=\"sr-only\">(current)</span>";
    break;
}
?>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li <?php echo $vt?>>
            <a class="nav-link" href="../index.php">Menu<?php echo $vts;?></a>
        </li>
        <li <?php echo $cs?>>
            <a class="nav-link" href="userClient/-client_self.php">Perfíl<?php echo $mss;?></a>
        </li>
        <li <?php echo $cc?>>
            <a class="nav-link" href="userClient/carrito.php">Carrito<?php echo $ccs;?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="-sesion_off.php">Cerrar sesion</a>
        </li>
    </ul>
</div>