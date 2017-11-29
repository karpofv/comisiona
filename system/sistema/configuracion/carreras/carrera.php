<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Carreras</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&txtcarrera='+$('#txtcarrera').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-12" style="display: block;">
                            <label class="control-label" for="txtcarrera">Carrera</label>
                            <input class="form-control" id="txtcarrera" type="text" value="<?php echo $txtcarrera; ?>" required>
                            <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Carreras registradas</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="carreras">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Carrera</strong></td>
                            <td class="text-center"><strong>Estatus</strong></td>
                            <td class="text-center"><strong>Editar</strong></td>
                            <td class="text-center"><strong>Eliminar</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($consulcarreras as $carreras){
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $carreras[carr_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <?php echo $carreras[st_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $carreras[carr_codigo];?>&editar=1&ver=1', 'verContenido','');"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $carreras[carr_codigo];?>&eliminar=1&ver=1', 'verContenido','');"><i class="fa fa-eraser"></i>
                                    </a> </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
