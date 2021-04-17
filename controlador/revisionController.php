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
                $this->db = null;
            } catch (PDOException $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error en la consulta a la base de datps');
                return $mensaje;
            }
        }
        //funcion para validar si hubo una revision los dias anteriores no superiores a los 15 dias habiles
        public function validarDiasRevision($fechaA,$fecha,$placa){
            try {
                $sql = $this->db->prepare("SELECT * FROM visual WHERE fechainicial BETWEEN '".$fechaA."' AND curdate() and placa='".$placa."' order by consecutivowil desc limit 1");
                $sql->execute();
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);
                if(!$res){
                    return "vacio";
                } else {
                    $mensaje = json_encode($res);
                    return $mensaje;
                }
                $this->db = null;
            } catch (PDOEXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al ejecutar la consulta '.$e);
                return json_encode($mensaje);
            }
        }
        //Funcion que se ejecutara cuando se detecte el mismo vehiculo en un intervalo menor a 15 dias
        public function verficiarRevisionAnterior($placa,$num){
            try {
                $query = $this->db->prepare("SELECT DISTINCT defectos.grupo, defectos.descripcion, defectos.tipo, visual.resultado, defectos.codError FROM defectos,visual WHERE visual.placa = '".$placa."' AND defectos.tipo != '' order by visual.consecutivowil desc limit '".$num."'");
                $query->execute();

                $res = $query->fetchALL(PDO::FETCH_ASSOC);
                //se devuelve un array con las revisiones ojo, se tiene que limitar por el tipo de vehiculo moto 47 defectos... etc
                if($res){
                    return json_encode($res);
                }else{
                    $mensaje = array('type'=>'error','mensaje'=>'No se encontraron datos');
                    return json_encode($mensaje);
                }
                $this->db = null;
            } catch (PDOEXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error en la consulta de revision '.$e);
                return json_encode($mensaje);
            }
        }
    }

    //$rc = new revisionController();
    //$rc->verficiarRevision('20082251');
    //echo $rc->validarDiasRevision('2020-09-28','2021-04-17',"SDH09E");
?>