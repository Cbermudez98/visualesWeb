<?php
    class Conexion{

        //Habilitar esta parte del codigo
        /*public function obtenerEstado(){
            $path = "C:\\WIL\\Config.ini";
            //Ya esta leyendo el archivo configuracion
            $file = fopen($path, "r");
            $aux = [];
            $auxLine = 0;
            while(!feof($file)){
                $aux[$auxLine] = fgets($file);
                $auxLine++;
            }

            for ($i=0; $i < count($aux) ; $i++) { 
                echo $aux[$i]."</br>";
            }

            fclose($file);
        }*/

        public static function conectar(){
            $db_name = "newwilnewfinal";
            $db_user = "root";
            $db_pass = "123456789";
            $db_host = "localhost";
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
    //$con = new Conexion();
    //$con->conectar();
?>