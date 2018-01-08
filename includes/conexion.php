<?php
    require_once 'conf/db.php';
    /* CREAMOS LA CONEXION CON PDO */
    class Conexion extends datosConexion {
        //obtener la conexion a la base de datos MYSQL
        public function obtenerConexionMy() {
            try {
                $conectarMYSQL = new PDO("mysql:host=$this->servidorMy;dbname=$this->dbMy;", $this->usuarioMy, $this->claveMy);
                return $conectarMYSQL;
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
                exit;
            }
        }
        public function DoBackup(){
            $backup_file = $this->dbMy . date("Y-m-d-H-i-s") . '.gz';
            // comandos a ejecutar
            $command = "mysqldump --opt -h $this->servidorMy -u $this->usuarioMy -p$this->claveMy $this->dbMy | gzip > $backup_file";
            // ejecución y salida de éxito o errores
            system($command,$output);
            if($output==0){
                paraTodos::alerta("Respaldo Exitoso", "success");   
            } else {
                paraTodos::alerta("$this->claveMy Ha ocurrido un inconveniente", "warning");                   
            }
            echo $output;
        }        
    }
?>