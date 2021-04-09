<?php
    require_once("../db/db.php");
    class usuarioController{
        private $db;

        public function __construct(){
            $this->db = Conexion::conectar();
        }
        //Validar si el usuario existe en la base de datos

        public function validarUsuario($user,$pass){
            try {
                if($user == "" || $user == null || $pass == "" || $pass == null){
                    $mensaje = array("type"=>"error", "mensaje"=>"Error en los datos ingresados");
                    return $mensaje;
                }
                //echo "Entro a validarUsuario";
                $query = $this->db->prepare("SELECT * FROM usuario WHERE usuario='".$user."' AND contrasena='".$pass."'");
                //$query->bindParam("user",$user);
                //$query->bindParam("pass",$pass);
                $query->execute();

                $result = $query->fetch(PDO::FETCH_ASSOC);

                if(!$result){
                    $mensaje = array("type"=>"error","mensaje"=>"Error no se encontro el usuario");
                    return json_encode($mensaje);
                } else {
                    //Crear variables de session y configurar la configuracion de cookies
                    $mensaje = array("type"=>"success","mensaje"=>"Bienvenido ".$user);
                    return $mensaje;
                }

            } catch (PDOException $e) {
                $mensaje = array("type"=>"error","mensaje"=>"Error al verificar los datos ".$e);
                return $mensaje;
            }
        }
        
    }
?>