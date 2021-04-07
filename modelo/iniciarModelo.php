<?php
    class usuario{
        public $usuario;
        public $password;

        //Getters
        public function getUsuario(){
            return $this->usuario;
        }

        public function getPassword(){
            return $this->password;
        }

        //Setters

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function validarData(){
            if($this->usuario == "" || $this->password == ""){
                $mensaje = array("type"=>"error","mensaje"=>"Error en los datos ingresados");
                echo json_encode($mensaje);
            } else {
                $mensaje = array("type"=>"success","mensaje"=>"Bienvenido ".$this->usuario);
                echo json_encode($mensaje);
            }
        }
    }

    $user = new usuario();
    $user->setUsuario($_POST['usuario']);
    $pw = base64_encode($_POST['password']);
    $user->setPassword($pw);
    $user->validarData();
?>