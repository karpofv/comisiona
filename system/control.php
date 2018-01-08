<?php
    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);

    require("../includes/conf/parametros.php");
    require("../includes/conf/firewall.php");
    require("../includes/conexion.php");
    require("../includes/tools.php");
    require("../includes/combos.php");
    require("clases/class.menu.php");

    $idMenu = $_POST[dmn];
    $idSubMenu = $_POST[ver];
    $act = $_POST[act];
    if($act==""){
        $act=1;
    }
    if($idSubMenu==""){
        $menu = "redirecciones";
        $menusuf = "redir_";
        $act=1;
    } else {
        $menu = "menu_submenu";
        $menusuf = "subm_";
    }
    if($idMenu==""){
        $idMenu=1;
    }
    $consulenlace = paraTodos::arrayConsulta("*", "$menu", $menusuf."codigo=$idMenu");
    foreach($consulenlace as $rowenlace){
        $enlace = $rowenlace[$menusuf."url".$act];
        $modelo = $rowenlace[$menusuf."modelo"];
        $jquery = $rowenlace[$menusuf."jquery"];
    }
    /*Se verifican los permisos para el modulo llamado*/
    $consulpermisos = paraTodos::arrayConsulta("*", "perfiles_det", "perdet_perfcodigo=$_SESSION[usuario_perfil]");
    $accPermisos['S'] = $consulpermisos[0][perdet_S];
    $accPermisos['U'] = $consulpermisos[0][perdet_U];
    $accPermisos['D'] = $consulpermisos[0][perdet_D];
    $accPermisos['I'] = $consulpermisos[0][perdet_I];
    $accPermisos['P'] = $consulpermisos[0][perdet_P];
    if($modelo!="" and $_POST[actd]==""){
        include($modelo);
    }
    if($enlace!=""){
        include($enlace);
    }
    if($jquery!="" and $_POST[actd]==""){
        ?>
    <script>
        <?php include($jquery);?>
    </script>
    <?php

    }
?>
