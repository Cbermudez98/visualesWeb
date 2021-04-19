<?php
    if(isset($_SESSION['user'])){
        die("No tiene autorizacion para estar aqui");
    }
    require_once('../db/db.php');
    require_once('../modelo/defectoModel.php');
    require_once('../controlador/revisionController.php');
    require_once('../modelo/revisionModel.php');
    class controladorDefecto{
        private $db;

        public function __construct(){
            $this->db = Conexion::conectar();
        }

        public function getDefectos($tipoVehiculo){
            try {
                $query = $this->db->prepare('SELECT * FROM defectos where tipovehiculo = "'.$tipoVehiculo.'" and tipo != "" and grupo != "" and tipovehiculo != ""');
                $query->execute();
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                if($res){
                    return json_encode($res);
                } else {
                    $mensaje = array('type'=>'error','mensaje'=>'No se encontraron datos');
                    return json_encode($mensaje);
                }
                $this->db = null;
            } catch (PDOException $e) {
                $mensaje = array('type'=>'error','mensaje'=>'Error al ejecutar la consulta de defectos '.$e);
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
                    $rc = new revisionController();
                    $fechaA = strtotime('-15 day',strtotime($rm->getFecha()));
                    $date = date('Y-m-d',$fechaA);
                    $rms = $rc->validarDiasRevision($fechaA,$rm->getFecha(),$rm->getPlaca());
                    //echo $rms;
                    //dependiendo el vehiculo asi asignar la cantidad a la variable $num
                    $num = "";
                    if($_POST['tipoVehiculo'] == "MOTOCICLETA"){
                        $tv = "moto";
                        $num = (int)"47";
                    }
                    //Terminar de validar todos los campos
                    if($_POST['tipoVehiculo'] == "AUTOMOVIL" || $_POST['tipoVehiculo'] == "CAMPERO" || $_POST['tipoVehiculo'] == "CAMION" || $_POST['tipoVehiculo'] == "CAMIONETA"){
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

                    if($rms == "vacio"){
                        //Bloque de codigo para primera vez mostrar en rojo en el frontend
                        $de = new Defecto();
                        $de->setTipoVehiculo($tv);
                        $cd = new controladorDefecto();
                        //echo $de->getTipoVehiculo();
                        $res = $cd->getDefectos($de->getTipoVehiculo());
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