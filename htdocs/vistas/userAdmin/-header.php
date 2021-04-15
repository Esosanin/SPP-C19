<?php
$Act = basename($_SERVER['PHP_SELF']);
$am = 'class=\"nav-item\"'; $as = 'class=\"nav-item\"'; $Als = 'class=\"nav-item\"'; $al = 'class=\"nav-item\"'; $alv = 'class=\"nav-item\"'; $ac = 'class=\"nav-item\"';
$ams; $ass; $alss; $als; $alvs; $acs;
switch($Act)
{
    case "-admin_menu.php":
    case "-admin_menu.php#":
        $am = 'class=\'nav-item active\'';
        $ams = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-admin_self.php":
    case "-admin_self.php#":
        $as = 'class=\'nav-item active\'';
        $ass = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-admin_list_products.php":
    case "-admin_list_products.php#":
        $Als = 'class=\'nav-item active\'';
        $alss = "<span class=\"sr-only\">(current)</span>";
    break;
    case "gestion_pedidos.php":
    case "gestion_pedidos.php#":
        $al = 'class=\'nav-item active\'';
        $als = "<span class=\"sr-only\">(current)</span>";
    break;
    case "gestion_ventas.php":
    case "gestion_ventas.php#":
        $alv = 'class=\'nav-item active\'';
        $alvs = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-admin_comment.php":
    case "-admin_comment.php#":
        $ac = 'class=\'nav-item active\'';
        $acs = "<span class=\"sr-only\">(current)</span>";
    break;
}
?>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li <?php echo $am?>>
            <a class="nav-link" href="-admin_menu.php">Menú<?php echo $ams;?></a>
        </li>
        <li <?php echo $as?>>
            <a class="nav-link" href="-admin_self.php">Perfíl<?php echo $ass;?></a>
        </li>
        <li <?php echo $Als?>>
            <a class="nav-link" href="-admin_list_products.php">Listado de Productos<?php echo $alss;?></a>
        </li>
        <li <?php echo $al?>>
            <a class="nav-link" href="gestion_pedidos.php">Pedidos<?php echo $als;?></a>
        </li>
        <li <?php echo $alv?>>
            <a class="nav-link" href="gestion_ventas.php">Listado de Ventas<?php echo $alvs;?></a>
        </li>
        <li <?php echo $ac?>>
            <a class="nav-link" href="-admin_comment.php">Comentarios<?php echo $acs;?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../-sesion_off.php">Cerrar sesion</a>
        </li>
    </ul>
</div>