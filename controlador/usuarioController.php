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
                    return $mensaje;
                } else {
                    //Crear variables de session y configurar la configuracion de cookies
                    session_start();
                    $_SESSION['user'] = $result['usuario'];
                    $mensaje = array("type"=>"success","mensaje"=>$_SESSION['user']);
                    return $mensaje;
                }
                $this->db = null;
            } catch (PDOException $e) {
                $mensaje = array("type"=>"error","mensaje"=>"Error al verificar los datos ".$e);
                return $mensaje;
            }
        }

        public function logOut($user){
            try {
                session_start();
                if(isset($_SESSION['user'])){
                    session_destroy();
                    $mensaje = array("type"=>"success","mensaje"=>"Exito al cerrar sesion");
                    return $mensaje;
                } else {
                    $mensaje = array("type"=>"error","mensaje"=>"Error no ha iniciado session");
                    return $mensaje;
                }
            } catch (EXception $e) {
                $mensaje = array("type"=>"error","mensaje"=>"Error al cerrar sesion");
            }
        }
        
    }
?>