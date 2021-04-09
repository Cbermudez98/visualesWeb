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
    }
?>