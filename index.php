<?php
include("includes/conf/parametros.php");
include("includes/layout/headp.php");
?>
<body class="bg-login">
    <div class="col-xs-12 col-sm-8 col-md-9"> </div>
    <div class="col-xs-12 col-sm-4 col-md-3 animated fadeInDown" style="    min-height: 100%;
    display: flex; padding:0px;">
        <div class="row panel-wellcom" style="width:100%; margin-left:0px;">
            <?php
            if($_GET[info]!=""){
                $error_msg = $info[$_GET[info]];
            ?>
            <div class="row animated flipInY">
                <div class="alert alert-error-login alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $error_msg;?>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="loginColumns col-md-12">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="index2.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Usuario" id="user" name="user" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass" required="">
                        </div>
                        <button type="submit" class="btn block full-width m-b" style="background-color:white; color:black;">Ingresar</button>
                        <a href="#" style="color:white;"> <small>¿Olvidó la contraseña?</small> </a>
                    </form>
                </div>
            </div>
            <div class="row" style="color:white;">
                <div class="col-md-12 text-center"> <b>Copyright UNELLEZ</b> </div>
                <div class="col-md-12 text-center"> <small><b>© 2017-2018</b></small> </div>
            </div>
        </div>
        <hr/>
    </div>
    <?php
    include("includes/layout/footp.php");
    ?>
