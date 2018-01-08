<?php
    $editar = $_POST[editar];
    $eliminar = $_POST[eliminar];
    $txtfecha = $_POST[txtfecha];
    $selsubins = $_POST[selsubins];
    $selsubpre = $_POST[selsubpre];
    $selperiodo = $_POST[selperiodo];
    if($editar==1 and $codigo=="" and $selsubins!=""){
        $insertar = paraTodos::arrayInserte("sol_fecha, sol_percodigo, sol_subproyecto_inscribir, sol_periodoacad, sol_subproyecto_prelacion, sol_tipo", "solicitud", "'$txtfecha',1,'$selsubins', '$selperiodo','$selsubpre',1");
        if($insertar){
            paraTodos::alerta("Registro exitoso", 'success');
        }
        $codigo = "";
        $selsubins = "";
        $selsubpre = "";
        $selperiodo = "";
        $txtfecha = "";
    }
    if($editar==1 and $codigo!="" and $selsubins!=""){
        $update = paraTodos::arrayUpdate("carr_descripcion='$txtcarrera'", "carrera", "carr_codigo=$codigo");
        if($update){
            paraTodos::alerta("Actualización exitosa", 'success');
        }
        $codigo = "";
        $selsubins = "";
        $selsubpre = "";
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
    $consulsol = paraTodos::arrayConsulta("*", "solicitud s, persona p, tools_status", "sol_tipo=2 and s.sol_percodigo=p.per_codigo and p.per_cedula=$_SESSION[ci] and sol_status=st_codigo");
?>
