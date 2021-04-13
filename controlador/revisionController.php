<?php
    //session_start();
    if(!isset($_SESSION['user'])){
        die("No tiene autorizacion para estar aqui");
    }
    require_once('../db/db.php');
    class revisionController{
        private $db;

        public function __construct(){
            $this->db = Conexion::conectar();
        }

        public function listarVehiculos(){
            try {
                $query = $this->db->prepare("SELECT revision.fecha, revision.hora, revision.consecutivowil, revision.targa, vehiculo.clase,  revision.visibles from revision,vehiculo WHERE revision.consecutivowil = vehiculo.consecutivowil and fecha = CURDATE() and visibles = 'NO'");
                $query->execute();
                //Para amentar la memoria de la consulta en php
                ini_set('memory_limit', '-1');
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                
                if(!$res){
                    $mensaje = array('type'=>'error','mensaje'=>'No se encontraron datos');
                    echo json_encode($mensaje);
                } else {
                    //Se devulve un array asosiativo y lo transformo en json para enviarlo al frontend
                    echo json_encode($res);
                }
            } catch (PDOException $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error en la consulta a la base de datps');
                return $mensaje;
            }
        }

        public function verficiarRevision($consecutivo){
            try {
                $query = $this->db->prepare("SELECT resultado,codigodefecto,tipo FROM visual where consecutivowil = '".$consecutivo."' and resultado = 'I'");
                $query->execute();

                $res = $query->fetchALL(PDO::FETCH_ASSOC);

                if($res){
                    echo json_encode($res);
                }else{
                    echo "No se encontraron datos ";
                } 

            } catch (PDOEXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error en la consulta de revision '.$e);
                echo json_encode($mensaje);
            }
        }
    }

    //$rc = new revisionController();
    //$rc->verficiarRevision('20082251');
?>