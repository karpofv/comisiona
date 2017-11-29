<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Subproyectos</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&selcarrera='+$('#selcarrera').val()+'&txtsubp='+$('#txtsubp').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-6" style="display: block;">
                            <label class="control-label" for="selcarrera">Carrera</label>
                            <select id="selcarrera" class="form-control" required>
                                <option value="">Seleccione una carrera</option>
                                <?php
                                combos::CombosSelect("1", "$selcarrera", "carr_codigo, carr_descripcion", "carrera", "carr_codigo", "carr_descripcion", "1=1");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6" style="display: block;">
                            <label class="control-label" for="txtsubp">Subproyecto</label>
                            <input class="form-control" id="txtsubp" type="text" value="<?php echo $txtsubp; ?>" required>
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
                <h5>Subproyectos registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="subproyectos">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Carrera</strong></td>
                            <td class="text-center"><strong>Subproyecto</strong></td>
                            <td class="text-center"><strong>Estatus</strong></td>
                            <td class="text-center"><strong>Editar</strong></td>
                            <td class="text-center"><strong>Eliminar</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($consulsubproyecto as $subproyecto){
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $subproyecto[carr_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <?php echo $subproyecto[subp_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <?php echo $subproyecto[st_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $subproyecto[subp_codigo];?>&editar=1&ver=1', 'verContenido','');"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $subproyecto[subp_codigo];?>&eliminar=1&ver=1', 'verContenido','');"><i class="fa fa-eraser"></i>
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
