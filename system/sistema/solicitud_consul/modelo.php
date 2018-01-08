<?php
    $desde = $_POST[desde];
    $hasta = $_POST[hasta];
    $estado = $_POST[estado];
    $opcion = $_POST[actd];
    if($opcion!=""){
        if($opcion==1){
            if($estado!=""){
                $estado_cond = "and sol_status='$estado'";
            }
            if($hasta!=""){
                $hasta_cond = "and sol_fecha<='$hasta'";
            }
            //Se consultan todas las solicitudes que posean los parametros filtrados
            $consul_solicitud = paraTodos::arrayConsulta("*", "solicitud s, persona p, tools_status st", " sol_status=st_codigo and sol_percodigo=per_codigo and sol_fecha>='$desde' $hasta_cond $estado_cond");
            foreach($consul_solicitud as $solicitud){
                if($solicitud[sol_tipo]==2){
                    $label = "label-primary";
                    $label_content = "GENERAL";
                } else {
                    $label = "label-warning";
                    $label_content = "LEVANTAMIENTO DE PRELACIÓN";                    
                }
                
?>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
                <?php echo $solicitud[per_apellidos]." ".$solicitud[per_nombres]?>
            </h5> <span class="label <?php echo $label;?>"><?php echo $label_content;?></span>
            <div class="pull-right text-right">
                <span class="label"><?php echo $solicitud[st_descripcion];?></span>
            </div>
        </div>
        <div class="ibox-content">
            <div>
                <?php if($solicitud[sol_tipo]==2){?>
                <p>
                    <?php echo $solicitud[sol_descripcion];?>
                </p>
                <?php } else {?>
                <span class="label label-primary">Suproyecto a inscribir</span>
                <span class="label label-primary">Suproyecto en prelación</span>
                <span class="label label-primary">Periodo Académico</span>
                <?php }?>
            </div>
            <?php
                if($solicitud[st_codigo]==2){
            ?>
            <div class="pull-right text-right">
                <span class="label label-danger"><a href="javscript:void(0)" style="color:white;">Ver resolución</a></span>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
            }
        }
    }
?>
