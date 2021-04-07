<?php
    try {
        $mensaje;
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
    
            if($usuario === "" || $password === "" || $usuario === null || $password === null){
                $mensaje = array("type"=>"error","mensaje"=>"Error complete los campos");
                echo json_encode($mensaje);
            } else {
                $mensaje = array("type"=>"success","mensaje"=>"Bienvenido");
                echo json_encode($mensaje);
            }
        } else {
            $mensaje = array("type"=>"error","mensaje"=>"Error complete los campos");
            echo json_encode($mensaje);
        }
    } catch (Exception $e) {
        $mensaje = array("type"=>"error","mensaje"=>"se ha detectado un error al procesar los datos");
        echo json_encode($mensaje);
    }
    /* Terminas de validar los campos con php y habilitar el loader en el frontend */
?>