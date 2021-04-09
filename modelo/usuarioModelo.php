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
    }
    $user = new Usuario();
    $user->setUsuario($_POST['usuario']);
    $pwd = base64_encode($_POST['password']);
    $user->setPassword($pwd);
    $user->validarData();
?>