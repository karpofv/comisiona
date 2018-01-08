<div class="col-lg-12 animated fadeInRight">
    <div class="mail-box-header">
        <h2>Opciones de filtrado</h2>
    </div>
    <div class="mail-box">
        <div class="container-fluid">
            <div class="col-sm-3">
                <label class="control-label">Desde</label>
                <input type="date" class="form-control" id="fecdesde">
            </div>
            <div class="col-sm-3">
                <label class="control-label">Hasta</label>
                <input type="date" class="form-control" id="fechasta">
            </div>
            <div class="col-sm-3">
                <label class="control-label">Estado</label>
                <select class="form-control" id="selestado">
                    <option value="">Seleccione una opción</option>
                    <?php
                        combos::CombosSelect("1", "", "*", "tools_status", "st_codigo", "st_descripcion", "1=1");
                    ?>
                </select>                    
            </div>
            <div class="col-sm-3">
                <input type="button" class="btn btn-default" value="FILTRAR" onclick="controler('dmn=<?php echo $idMenu;?>&ver=1&act=20&actd=1&desde='+$('#fecdesde').val()+'&hasta='+$('#fechasta').val()+'&estado='+$('#selestado').val(), 'div_result', '')">
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 animated fadeInRight">
    <div class="mail-box-header">
        <h2>Resultados Obtenidos</h2>
    </div>
    <div class="mail-box">
        <div class="container-fluid" id="div_result">
        </div>
    </div>
</div>