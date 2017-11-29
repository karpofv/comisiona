<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $selcarrera = $_POST[selcarrera];
    $txtsubp = $_POST[txtsubp];
    $codigo = $_POST[codigo];
    if($editar==1 and $codigo=="" and $txtsubp!=""){
        $insertar = paraTodos::arrayInserte("subp_descripcion, subp_carrcodigo", "subproyecto", "'$txtsubp', $selcarrera");
        if($insertar){
            paraTodos::alerta("Registro exitoso", 'success');
        }
        $codigo = "";
        $selcarrera = "";
        $txtsubp = "";
    }
    if($editar==1 and $codigo!="" and $txtsubp!=""){
        $update = paraTodos::arrayUpdate("subp_descripcion='$txtsubp', subp_carrcodigo=$selcarrera", "subproyecto", "subp_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa", 'success');
        }
        $codigo = "";
        $selcarrera = "";
        $txtsubp = "";
    }
    if($codigo!="" and $eliminar==1){
        $delete = paraTodos::arrayDelete("subp_codigo=$codigo", "subproyecto");
        if($delete){
            paraTodos::alerta("Registro eliminado", 'success');
        }      
        $eliminar = "";
        $codigo = "";
    }
    if($editar==1 and $codigo!="" and $txtsubp==""){
        $consulsubproyecto = paraTodos::arrayConsulta("*", "subproyecto, carrera", "subp_codigo=$codigo and subp_carrcodigo=carr_codigo");
        foreach($consulsubproyecto as $subproyecto){            
            $txtsubp = $subproyecto[subp_descripcion];
            $selcarrera = $subproyecto[carr_codigo];
        }
    }
    $consulsubproyecto = paraTodos::arrayConsulta("*", "subproyecto s, carrera, tools_status", "s.subp_carrcodigo=carr_codigo and subp_status=st_codigo");
?>