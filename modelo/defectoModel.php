<?php
    require_once('../controlador/controladorDefecto.php');
    require_once('revisionModel.php');
    class Defecto{
        public $codError;
        public $descripcion;
        public $tipo;
        public $grupo;
        public $tipoVehiculo;

        //Constructor de la clase
        public function __constructor(){

        }

        //Getters
        public function getCodError(){
            return $this->codError;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function getGrupo(){
            return $this->grupo;
        }

        public function getTipoVehiculo(){
            return $this->tipoVehiculo;
        }

        //Setters
        public function setCodError($codError){
            $this->codError = $codError;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function setGrupo($grupo){
            $this->grupo = $grupo;
        }

        public function setTipoVehiculo($tipoVehiculo){
            $this->tipoVehiculo = $tipoVehiculo;
        }
    }

?>