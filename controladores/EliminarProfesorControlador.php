<?php

session_start();

if($_SESSION['rol'] != 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{
    $idusuario =  $_GET['id'];
    require '../modelo/ProfesorData.php';
    $datos = new ProfesorData();
    $eliminado = $datos->eliminarProfesor($idusuario);
    if($eliminado){
        $datos = new ProfesorData();
        $listaProfesor = $datos->obtenerProfesores();
        $msg = "se ha eliminado correctamente el usuario con id ".$idusuario.".";
        $subVista = "listarProfesores.php"; 
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";
        
    }
    else{
        $datos = new ProfesorData();
        $listaProfesor = $datos->obtenerProfesores();
        $errormsg = "no fue posible eliminar";
        $subVista = "listarProfesores.php"; 
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";
    }
    


}


?>