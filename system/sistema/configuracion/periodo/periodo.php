<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Periodos</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&txtperiodo='+$('#txtperiodo').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-12" style="display: block;">
                            <label class="control-label" for="txtperiodo">Periodo Académico</label>
                            <input class="form-control" id="txtperiodo" type="text" value="<?php echo $txtperiodo; ?>" required>
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
                <h5>Periodos registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="periodos">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Periodo</strong></td>
                            <td class="text-center"><strong>Estatus</strong></td>
                            <td class="text-center"><strong>Editar</strong></td>
                            <td class="text-center"><strong>Eliminar</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($consulperiodos as $periodos){
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $periodos[perio_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <?php echo $periodos[st_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $periodos[perio_codigo];?>&editar=1&ver=1', 'verContenido','');"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $periodos[perio_codigo];?>&eliminar=1&ver=1', 'verContenido','');"><i class="fa fa-eraser"></i>
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
