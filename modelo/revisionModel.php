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

    //$re = new Revision();
    //$re->verificarRevision('20082253');
?>