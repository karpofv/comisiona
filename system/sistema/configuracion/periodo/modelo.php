<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $txtperiodo = $_POST[txtperiodo];
    $codigo = $_POST[codigo];
    if($editar==1 and $codigo=="" and $txtperiodo!=""){
        $insertar = paraTodos::arrayInserte("perio_descripcion", "periodo_acad", "'$txtperiodo'");
        if($insertar){
            paraTodos::alerta("Registro exitoso", 'success');
        }
        $codigo = "";
        $txtperiodo = "";
    }
    if($editar==1 and $codigo!="" and $txtperiodo!=""){
        $update = paraTodos::arrayUpdate("perio_descripcion='$txtperiodo'", "periodo_acad", "perio_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa", 'success');
        }
        $codigo = "";
        $txtperiodo = "";
    }
    if($codigo!="" and $eliminar==1){
        $delete = paraTodos::arrayDelete("perio_codigo=$codigo", "periodo_acad");
        if($delete){
            paraTodos::alerta("Registro eliminado", 'success');
        }      
        $eliminar = "";
        $codigo = "";
    }
    if($editar==1 and $codigo!="" and $txtperiodo==""){
        $consulperiodos = paraTodos::arrayConsulta("*", "periodo_acad", "perio_codigo=$codigo");
        foreach($consulperiodos as $periodos){            
            $txtperiodo = $periodos[perio_descripcion];
        }
    }
    $consulperiodos = paraTodos::arrayConsulta("*", "periodo_acad, tools_status", "perio_status=st_codigo");
?>