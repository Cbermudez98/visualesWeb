<?php
    require_once('config.php');
    class Conexion{

        public static function conectar(){
            //Leer el archivo config.php
            $config = new Config();
            $arr = $config->obtenerEstado();
            //print_r($arr);
            $db = "";
            $host = "";
            
            if(trim($arr[1]) == "prev=true"){
                $db = "preventiva";
            }

            if(trim($arr[1]) == "prev=false"){
                $db = "newwilnewfinal";
            }
            
            if(trim($arr[0]) == "localhost")

            $db_name = $db;
            $db_user = "root";
            $db_pass = "123456789";
            $db_host = $host;
            $port = "3307";
            /* Linea de conexion con mysql workbench----- "mysql:host=localhost;dbname=newwilnewfinal",$db_user,$db_name */

            try {

                $mdb = new PDO('mysql:host='.$db_host.':'.$port.';dbname='.$db_name,$db_user,$db_pass);
                //echo "Exito al conextar a la base de dato";
                //echo "Exito al conextar a la base de datos";
                $mdb->exec("set names utf8");
                return $mdb;
            } catch (PDOException $e) {
                die("Error en la conexion a la base de datos ".$e->getMessage());
            }
        }
    }
    //Validar si la conexion se esta realizando
    $con = new Conexion();
    $con->conectar();
?>