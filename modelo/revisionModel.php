<?php
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

        /*public function peticionDatos(){
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
        public function verificarRevision($fecha,$placa){
            try {
                $rev = new revisionController();
                $res = $rev->verficiarRevisionAnterior($fecha,$placa);
                return $res;
            } catch (EXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al verificar la revision del automovil '.$e);
                return json_encode($mensaje);
            }
        }

        public function validardias($fecha,$placa){
            try {
                $re = new revisionController();
                $fechaA = strtotime('-15 day',strtotime($fecha));
                $date = date('Y-m-d',$fechaA);
                $res = $re->validarDiasRevision($date,$fecha,$placa);
                $mensaje = "";
                if($res == "vacio"){
                    $mensaje = "false";
                } else {
                    $mensaje = "true";
                }
                return $mensaje;
            } catch (EXception $e) {
                $mensaje = array('type'=>'error','mensaje'=>'error en la consulta '.$e);
                return $mensaje;
            }
        }*/
    }

    
?>