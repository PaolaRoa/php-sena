<?php

require '../modelo/ProfesorData.php';

if( (isset($_POST['documento'])) && (!empty($_POST['documento'])) &&
    (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
    (isset($_POST['email'])) && (!empty($_POST['email'])) &&
    (isset($_POST['clave'])) && (!empty($_POST['clave']))){

        $documento=$_POST['documento'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $clave=$_POST['clave'];
        $datos = new ProfesorData();
        $isEmailValid = $datos->validarEmail($email);
        
        $isDocValid = $datos->validarDocumento($documento);

        if ($isEmailValid && $isDocValid) { 

            $crearProfesor = $datos->crearProfesor($documento, $email, $nombre, $clave);
            echo $crearProfesor;
         } 
         else if(!$isEmailValid && !$isDocValid) {
             
                $ErrorCodigo = "El documento ".$documento." y el email ".$email." ya estan registrado";
                echo $ErrorCodigo;
        }
        else if(!$isEmailValid){
            $ErrorCodigo = "El email ".$email." ya esta registrado";
                echo $ErrorCodigo;
        }
        else{
            $ErrorCodigo = "El documento ".$documento." ya esta registrado";
            echo $ErrorCodigo;
        }
    }else {
            echo "else";
        // $subVista = "formularioCrearUsuario.php";       
    }

    // $vista = "crud.php";
    // require "../vistas/layout.php"

?>