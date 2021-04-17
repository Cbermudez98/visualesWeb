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

        public function getDefectos($tv){
            try {
                $cd = new controladorDefecto();
                $res = $cd->getDefectos($tv);
                return $res;
            } catch (EXCeption $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al obtener defectos '.$e);
                return json_encode($mensaje);
            }
        }
    }

    if(isset($_POST['peticion'])){
        $peticion = $_POST['peticion'];

        switch ($peticion) {
            case 'llenarTablaDefecto':
                if(isset($_POST['tipoVehiculo']) && $_POST['fecha'] && $_POST['placa']){
                    //Primero validar el tiempo de revision es menor o mayor a los 15 dias habiles para tomas como si fuera primera o segunda vez
                    $rm = new Revision();
                    $rm->setFecha($_POST['fecha']);
                    $rm->setPlaca($_POST['placa']);

                    $rms = $rm->validardias($rm->getFecha(),$rm->getPlaca());
                    //echo $rms;
                    //dependiendo el vehiculo asi asignar la cantidad a la variable $num
                    $num = "";
                    if($_POST['tipoVehiculo'] == "MOTOCICLETA"){
                        $tv = "moto";
                        $num = (int)"47";
                    }
                    //Terminar de validar todos los campos
                    if($_POST['tipoVehiculo'] == "AUTOMOVIL" || $_POST['tipoVehiculo'] == "CAMPERO"){
                        $tv = "carro";
                        $num = (int)"171";
                    }
                    if($rms == "true"){
                        //Bloque de codigo para segunda vez
                        $rc = new revisionController();
                        $result = $rc->verficiarRevisionAnterior($rm->getPlaca(),$num);
                        //Se obtiene el array de defectos anteriores a 15 dias ahora se compara con con el array de errores para finalmente mostrar en la base de datos
                        //$de = new Defecto();
                        //$de->setTipoVehiculo($tv);
                        //echo $de->getTipoVehiculo();
                        //$res = $de->getDefectos($de->getTipoVehiculo());
                        echo $result;
                    }

                    if($rms == "false"){
                        //Bloque de codigo para primera vez mostrar en rojo en el frontend
                        $de = new Defecto();
                        $de->setTipoVehiculo($tv);
                        //echo $de->getTipoVehiculo();
                        $res = $de->getDefectos($de->getTipoVehiculo());
                        echo $res;
                    }
                    
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    //$de = new Defecto();
    //$de->setTipoVehiculo("Moto");
    //echo $de->getTipoVehiculo();
    //$res = $de->getDefectos($de->getTipoVehiculo());
    //echo $res;
?>