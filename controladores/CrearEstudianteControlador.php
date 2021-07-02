<?php

require '../modelo/EstudianteData.php';

if( (isset($_POST['documento'])) && (!empty($_POST['documento'])) &&
    (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
    (isset($_POST['email'])) && (!empty($_POST['email'])) &&
    (isset($_POST['clave'])) && (!empty($_POST['clave']))){

        $documento=$_POST['documento'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $clave=$_POST['clave'];
        $datos = new EstudianteData();
        $isEmailValid = $datos->validarEmail($email);
        
        $isDocValid = $datos->validarDocumento($documento);

        if ($isEmailValid && $isDocValid) { 

            $crearEstudiante = $datos->crearEstudiante($documento, $email, $nombre, $clave);
            if($crearEstudiante){
                $datos = new EstudianteData();
                $listaEstudiantes = $datos->obtenerEstudiantes();
                $subVista="listarEstudiantes.php";
            }
            else{
                $subVista = "formularioCrearEstudiante.php";
            }
            
         } 
         else if(!$isEmailValid && !$isDocValid) {
             
                $ErrorCodigo = "El documento ".$documento." y el email ".$email." ya estan registrado";
                $subVista = "formularioCrearEstudiante.php";
        }
        else if(!$isEmailValid){
            $ErrorCodigo = "El email ".$email." ya esta registrado";
            $subVista = "formularioCrearEstudiante.php";
        }
        else{
            $ErrorCodigo = "El documento ".$documento." ya esta registrados";
            $subVista = "formularioCrearEstudiante.php";
        }
    }else {
            
            $subVista = "formularioCrearEstudiante.php";    
    }

    $vista = "crudEstudiantes.php";
    require "../vistas/layout.php"

?>