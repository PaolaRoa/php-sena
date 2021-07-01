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
            if($crearProfesor){
                $datos = new ProfesorData();
                $listaProfesor = $datos->obtenerProfesores();
                $subVista="listarProfesores.php";
            }
            else{
                $subVista = "formularioCrearProfesor.php";
            }
            
         } 
         else if(!$isEmailValid && !$isDocValid) {
             
                $ErrorCodigo = "El documento ".$documento." y el email ".$email." ya estan registrado";
                $subVista = "formularioCrearProfesor.php";
        }
        else if(!$isEmailValid){
            $ErrorCodigo = "El email ".$email." ya esta registrado";
            $subVista = "formularioCrearProfesor.php";
        }
        else{
            $ErrorCodigo = "El documento ".$documento." ya esta registrados";
            $subVista = "formularioCrearProfesor.php";
        }
    }else {
            
            $subVista = "formularioCrearProfesor.php";    
    }

    $vista = "crudProfesores.php";
    require "../vistas/layout.php"

?>