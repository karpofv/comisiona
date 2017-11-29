<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $txtcarrera = $_POST[txtcarrera];
    $codigo = $_POST[codigo];
    if($editar==1 and $codigo=="" and $txtcarera!=""){
        $insertar = paraTodos::arrayInserte("carr_descripcion", "carrera", "'$txtcarrera'");
        if($insertar){
            paraTodos::alerta("Registro exitoso", 'success');
        }
        $codigo = "";
        $txtcarrera = "";
    }
    if($editar==1 and $codigo!="" and $txtcarrera!=""){
        $update = paraTodos::arrayUpdate("carr_descripcion='$txtcarrera'", "carrera", "carr_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa", 'success');
        }
        $codigo = "";
        $txtcarrera = "";
    }
    if($codigo!="" and $eliminar==1){
        /*Se valida esta carrera no tenga subproyectos asignados*/
        $valida = paraTodos::arrayConsultanum("*", "subproyecto", "subp_carrcodigo=$codigo");
        if($valida>0){
            paraTodos::alerta("Existen subproyectos asignados a esta carrera", 'warning');
        } else {
            $delete = paraTodos::arrayDelete("carr_codigo=$codigo", "carrera");
            if($delete){
                paraTodos::alerta("Registro eliminado", 'success');
            }      
        }    
        $eliminar = "";
        $codigo = "";
    }
    if($editar==1 and $codigo!="" and $carrera==""){
        $consulcarreras = paraTodos::arrayConsulta("*", "carrera", "carr_codigo=$codigo");
        foreach($consulcarreras as $carreras){            
            $txtcarrera = $carreras[carr_descripcion];
        }
    }
    $consulcarreras = paraTodos::arrayConsulta("*", "carrera, tools_status", "carr_status=st_codigo");
?>