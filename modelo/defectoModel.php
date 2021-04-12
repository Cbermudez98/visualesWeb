<?php
    require_once('../controlador/controladorDefecto.php');
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

        public function getDefectos($tv){
            try {
                $cd = new controladorDefecto();
                $res = $cd->getDefectos($tv);
                echo $res;
            } catch (EXCeption $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al obtener defectos '.$e);
                return json_encode($mensaje);
            }
        }
    }

    if(isset($_POST['peticion'])){
        $peticion = $_POST['peticion'];

        switch ($peticion) {
            case 'llenarTabla':
                if(isset($_POST['tipoVehiculo'])){
                    setTipoVehiculo($_POST['tipoVehiculo']);
                    $de = new Defecto();
                    $res = $de->getDefectos(getTipoVehiculo());
                    echo $res;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>