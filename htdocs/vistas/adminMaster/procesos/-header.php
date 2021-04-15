<?php
$Act = basename($_SERVER['PHP_SELF']);
$mm = 'class=\"nav-item\"'; $mself = 'class=\"nav-item\"'; $mr = 'class=\"nav-item\"'; $mshop = 'class=\"nav-item\"'; $mu = 'class=\"nav-item\"';
$mms; $mselfs; $mrs; $mshops; $mus;
switch($Act)
{
    case "-master_menu.php":
    case "-master_menu.php#":
        $mm = 'class=\'nav-item active\'';
        $mms = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-master_self.php":
    case "-master_self.php#":
        $mself = 'class=\'nav-item active\'';
        $mselfs = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-master_request.php":
    case "-master_request.php#":
        $mr = 'class=\'nav-item active\'';
        $mrs = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-master_shoplist.php":
    case "-master_shoplist.php#":
        $mshop = 'class=\'nav-item active\'';
        $mshops = "<span class=\"sr-only\">(current)</span>";
    break;
    case "-master_userlist.php":
    case "-master_userlist.php#":
        $mu = 'class=\'nav-item active\'';
        $mus = "<span class=\"sr-only\">(current)</span>";
    break;
}
?>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li <?php echo $mm?>>
            <a class="nav-link" href="../-master_menu.php">Menu<?php echo $mms;?></a>
        </li>
        <li <?php echo $mself?>>
            <a class="nav-link" href="../-master_self.php">Perfíl<?php echo $mselfs;?></a>
        </li>
        <li <?php echo $mr?>>
            <a class="nav-link" href="../-master_request.php">Solicitudes<?php echo $mrs;?></a>
        </li>
        <li <?php echo $mshop?>>
            <a class="nav-link" href="../-master_shoplist.php">Listado de Tiendas<?php echo $mshops;?></a>
        </li>
        <li <?php echo $mu?>>
            <a class="nav-link" href="../-master_userlist.php">Listado de Usuarios<?php echo $mus;?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../-sesion_off.php">Cerrar sesion</a>
        </li>
    </ul>
</div>