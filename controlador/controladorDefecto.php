<?php
    require_once('../db/db.php');
    class controladorDefecto{
        private $db;

        public function __construct(){
            $this->db = Conexion::conectar();
        }

        public function getDefectos($tipoVehiculo){
            try {
                $query = $this->db->prepare('SELECT * FROM defectos where tipovehiculo = "'.$tipoVehiculo.'" and tipo != "" and grupo != "" and tipovehiculo != ""');
                $query->execute();
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if($res){
                    return json_encode($res);
                } else {
                    $mensaje = array('type'=>'error','mensaje'=>'No se encontraron datos');
                    return json_encode($mensaje);
                }
                $this->db = null;
            } catch (PDOException $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al ejecutar la consulta de defectos '.$e);
                return json_encode($mensaje);
            }
        }
    }
?>