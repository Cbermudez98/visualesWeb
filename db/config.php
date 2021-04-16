<?php
    class Config{
        //Habilitar esta parte del codigo
        public function obtenerEstado(){
            $path = "C:\\WIL\\Config.ini";
            //Ya esta leyendo el archivo configuracion
            $file = fopen($path, "r");
            $aux = [];
            $auxLine = 0;
            while(!feof($file)){
                $aux[$auxLine] = fgets($file);
                $auxLine++;
            }

            //for ($i=0; $i < count($aux) ; $i++) { 
            //    echo $aux[$i]."</br>";
            //}
            fclose($file);
            return $aux;
        }

        public function cambiarEstado($modo,$moto){
            
            //$req = json_decode($obj);
            //Primero Preventiva recibo el objeto desde el frontend

            //Modo 2 estados true or false agregar a la cadena para modificar el archivo Config.ini en preventiva
            //echo "Entro en cambiar Estado";
            $url = "C:\\WIL\\Config.ini";
            $path = file_get_contents($url);
            $res = "";
            if($modo == "true" && $moto == "true"){
                $cad = array("prev=false","mot=false");
                $cadR = array("prev=true","mot=true");
                $strReplace = str_replace($cad,$cadR,$path);
                file_put_contents($url,$strReplace);
                $res = json_encode(array('type'=>'success','mensaje'=>'Se cambio el estado'));
            } 
            if($modo == "false" && $moto == "false") {
                $cad = array("prev=true","mot=true");
                $cadR = array("prev=false","mot=false");
                $strReplace = str_replace($cad,$cadR,$path);
                file_put_contents($url,$strReplace);
                $res = json_encode(array('type'=>'success','mensaje'=>'Se cambio el estado'));
            }

            if($modo == "true" && $moto == "false"){
                $cad = array("prev=false","mot=true");
                $cadR = array("prev=true","mot=false");
                $strReplace = str_replace($cad,$cadR,$path);
                file_put_contents($url,$strReplace);
                $res = json_encode(array('type'=>'success','mensaje'=>'Se cambio el estado'));
            } 

            if($modo == "false" && $moto == "true") {
                $cad = array("prev=true","mot=false");
                $cadR = array("prev=false","mot=true");
                $strReplace = str_replace($cad,$cadR,$path);
                file_put_contents($url,$strReplace);
                $res = json_encode(array('type'=>'success','mensaje'=>'Se cambio el estado'));
            }

            return $res;
            
        }
    }

    if(isset($_POST['peticion'])){
        if(isset($_POST['modo']) && isset($_POST['moto'])){
            $mod = $_POST['modo'];
            $mot = $_POST['moto'];
            $c = new Config();
            echo $c->cambiarEstado($mod,$mot);
        }
    }
   
?>