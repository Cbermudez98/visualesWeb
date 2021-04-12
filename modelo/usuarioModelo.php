<?php
    require_once("../controlador/usuarioController.php");
    class Usuario{
        public $usuario;
        public $password;

        //Constructor del modelo usuario
        public function __construct(){

        }

        //Getters
        public function getUsuario(){
            return $this->Usuario;
        }

        public function getPassword(){
            return $this->Password;
        }

        //Setters

        public function setUsuario($usuario){
            $this->Usuario = $usuario;
        }
        
        public function setPassword($password){
            $this->Password = $password;
        }

        public function validarData(){
            try {
                if($this->Usuario == "" || $this->Password == ""){
                    $mensaje = array("type"=>"error","mensaje"=>"Error en los datos ingresados");
                    echo json_encode($mensaje);
                } else {
                    $userC = new usuarioController();
                    $res = $userC->validarUsuario($this->Usuario,$this->Password);
                    echo json_encode($res);
                }
            } catch (EXception $e) {
                $mensaje = array("type"=>"error","mensaje"=>"Un error ha ocurrido ".$e);
            }
        }

        public function salir($user){
            try {
                $userC = new usuarioController();
                $res = $userC->logOut($user);
                return $res;
            } catch (EXception $e) {
                $mensaje = array("type"=>"error","mensaje"=>"Se ha producido un error al salir");
                return $mensaje;
            }
        }
    }
    if(isset($_POST['peticion'])){
        $peticion = $_POST['peticion'];

        switch ($peticion) {
            case 'logIn':
                $user = new Usuario();
                $user->setUsuario($_POST['usuario']);
                $pwd = base64_encode($_POST['password']);
                $user->setPassword($pwd);
                $user->validarData();   
                break;
            case 'logOut':
                session_start();
                if(isset($_SESSION['user'])){
                    $user = new Usuario();
                    $res = $user->salir($_SESSION['user']);
                    echo json_encode($res);
                }
            default:
                # code...
                break;
        }
    }
    
    
?>