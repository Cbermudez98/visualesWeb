<?php
    session_start();
    if(!isset($_SESSION['user'])){
        die("Error no tiene autorizacion para estar aqui");
    }

    require_once('../controlador/revisionController.php');
    class Revision{
        public $fecha;
        public $hora;
        public $consecutivowil;
        public $placa;
        public $tipovehiculo;
        public $visible;

        //Constructor
        public function __construct() {
            
        }

        //Getters
        public function getFecha(){
            return $this->fecha;
        }

        public function  getHora(){
            return $this->hora;
        }

        public function getConsecutivowil(){
            return $this->consecutivowil;
        }

        public function getPlaca(){
            return $this->placa;
        }

        public function getTipovehiculo(){
            return $this->tipovehiculo;
        }

        public function getVisible(){
            return $this->visible;
        }

        //Setters

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setHora($hora){
            $this->hora = $hora;
        }

        public function setConsecutivowil($consecutivowil){
            $this->consecutivowil = $consecutivowil;
        }

        public function setPlaca($placa){
            $this->placa = $placa;
        }

        public function setTipovehiculo($tipovehiculo){
            $this->tipovehiculo = $tipovehiculo;
        }

        public function setVisible($visible){
            $this->visible = $visible;
        }

        public function peticionDatos(){
            try {
                $rev = new revisionController();
                $res = $rev->listarVehiculos();
                return $res;
            } catch (EXception $e) {
                $mensaje = array("type"=>"error","mensaje"=>"error en la peticion");
                return json_encode($mensaje);
            }
        }
        //Cotejar los datos de dos consultas para mostrar en el frontend en la tabla modal defectos
        public function verificarRevision($consevutivo){
            try {
                $rev = new revisionController();
                $res = $rev->verficiarRevision($consevutivo);
                echo $res;
            } catch (EXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al verificar la revision del automovil '.$e);
                echo json_encode($mensaje);
            }
        }

        public function validardias($fecha,$placa){
            try {
                $re = new revisionController();
                $res = $re->validarDiasRevision($fecha,$placa);
                $mensaje = "";
                $r = json_decode($res,true);

                foreach ($r as $k) {
                    $cadena = "La diferencia de dias es de ".$k['dias_transcurridos'];
                    if((int)$k['dias_transcurridos'] > 15){
                        $mensaje = "false";
                    } else {
                        $mensaje = "true";
                    }
                }

                return $mensaje;
            } catch (EXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'error en la consulta '.$e);
                return $mensaje;
            }
        }
    }

    if(isset($_POST['peticion'])){
        $peticion = $_POST['peticion'];
        switch ($peticion) {
            case 'llenarTabla':
                $rev = new Revision();
                $res = $rev->peticionDatos();
                echo $res;
                break;
            
            default:
                # code...
                break;
        }
    }

    $re = new Revision();
    $res = $re->validarDias('2021-04-10',"NBZ874");
    //$re->verificarRevision('20082253');
    echo $res;
    
?>