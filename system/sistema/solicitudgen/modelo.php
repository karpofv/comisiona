<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $txtfecha = $_POST[txtfecha];
    $descsol = $_POST[descsol];
    $selperiodo = $_POST[selperiodo];
    if($editar==1 and $codigo=="" and $descsol!=""){
        $insertar = paraTodos::arrayInserte("sol_fecha, sol_percodigo, sol_periodoacad, sol_tipo, sol_descripcion", "solicitud", "'$txtfecha',1, '$selperiodo',2, '$descsol'");
        if($insertar){
            paraTodos::alerta("Registro exitoso", 'success');
        }
        $codigo = "";
        $descsol = "";
        $selperiodo = "";
        $txtfecha = "";
    }
    if($editar==1 and $codigo!="" and $descsol!=""){
        $update = paraTodos::arrayUpdate("sol_descripcion='$descsol'", "solicitud", "sol_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa", 'success');
        }
        $codigo = "";
        $descsol = "";
        $selperiodo = "";
        $txtfecha = "";
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
        $consulsolicitudes = paraTodos::arrayConsulta("*", "carrera", "carr_codigo=$codigo");
        foreach($consulcarreras as $carreras){
            $selsubins = "";
            $selsubpre = "";
            $selperiodo = "";
            $txtfecha = "";
            $txtcarrera = $carreras[carr_descripcion];
        }
    }
    $consulsol = paraTodos::arrayConsulta("*", "solicitud s, persona p, tools_status", "sol_tipo=1 and s.sol_percodigo=p.per_codigo and p.per_cedula=$_SESSION[ci] and sol_status=st_codigo");
?>
