<?php
    require_once('../db/db.php');
    class revisionController{
        private $db;

        public function __construct(){
            $this->db = Conexion::conectar();
        }

        public function listarVehiculos(){
            try {
                $query = $this->db->prepare('select revision.fecha, revision.hora, revision.consecutivowil, revision.targa, visual.tipovehiculo,  revision.visibles from revision inner join visual where revision.consecutivowil = visual.consecutivowil');
                $query->execute();
                //Para amentar la memoria de la consulta en php
                ini_set('memory_limit', '-1');
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                
                if(!$res){
                    $mensaje = array('type'=>'error','mensaje'=>'No se encontraron datos');
                    echo $mensaje;
                } else {
                    //Se devulve un array asosiativo y lo transformo en json para enviarlo al frontend
                    echo json_encode($res);
                }
            } catch (PDOEXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error en la consulta a la base de datps');
                return $mensaje;
            }
        }
    }

    $u = new revisionController;
    $u->listarVehiculos();
?>