<div class="row animated fadeInRight">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Levantar prelación</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&txtfecha='+$('#txtfecha').val()+'&selsubins='+$('#selsubins').val()+'&selsubpre='+$('#selsubpre').val()+'&selperiodo='+$('#selperiodo').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-2" style="display: block;">
                            <label class="control-label" for="txtfecha">Fecha</label>
                            <input class="form-control" id="txtfecha" type="date" value="<?php echo $txtfecha; ?>" required>
                            <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>
                        <div class="col-sm-4" style="display: block;">
                            <label class="control-label" for="selsubins">Subproyecto a Inscribir</label>
                            <select class="form-control" id="selsubins" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", "$selsubins", "subp_codigo, subp_descripcion", "subproyecto", "subp_codigo", "subp_descripcion", "subp_status=1");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4" style="display: block;">
                            <label class="control-label" for="selsubpre">Subproyecto en prelación</label>
                            <select class="form-control" id="selsubpre" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", "$selsubpre", "subp_codigo, subp_descripcion", "subproyecto", "subp_codigo", "subp_descripcion", "subp_status=1");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2" style="display: block;">
                            <label class="control-label" for="selperiodo">Periodo Académico</label>
                            <select class="form-control" id="selperiodo" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", "$selperiodo", "perio_codigo, perio_descripcion", "periodo_acad", "perio_codigo", "perio_descripcion", "perio_status=1");
                                ?>
                            </select>
                        </div>
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
<div class="col-lg-12 animated fadeInRight">
    <div class="mail-box-header">
        <h2>Historial de solicitudes</h2>
    </div>
    <div class="mail-box">
        <table class="table table-hover table-mail">
            <tbody>
                <?php
                    foreach($consulsol as $sol){
                ?>
                <tr class="unread">
                    <td class="mail-subject"><a href="javascript:void(0);"><?php echo $sol[sol_descripcion]?></a></td>
                    <td class="text-right mail-date"><?php echo paratodos::convertDate($sol[sol_fecha]);?></td>
                    <td class="text-right mail-date"><?php echo date("h:j:s", strtotime($sol[sol_fechareg]));?></td>
                    <td class="text-right"><?php echo $sol[st_descripcion];?></td>
                    <td class="text-right"><a href="#"><i class="fa fa-print"></i></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
