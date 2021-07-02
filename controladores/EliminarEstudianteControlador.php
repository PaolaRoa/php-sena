<?php

session_start();

if($_SESSION['rol'] != 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{
    $idusuario =  $_GET['id'];
    require '../modelo/EstudianteData.php';
    $datos = new EstudianteData();
    $eliminado = $datos->eliminarEstudiante($idusuario);
    if($eliminado){
        $datos = new EstudianteData();
        $listaEstudiantes = $datos->obtenerEstudiantes();
        $msg = "se ha eliminado correctamente el usuario con id ".$idusuario.".";
        $subVista = "listarEstudiantes.php"; 
        $vista = "crudEstudiantes.php";
        require "../vistas/layout.php";
        
    }
    else{
        $datos = new EstudianteData();
        $listaEstudiantes = $datos->obtenerEstudiantes();
        $errormsg = "no fue posible eliminar";
        $subVista = "listarEstudiantes.php"; 
        $vista = "crudEstudiantes.php";
        require "../vistas/layout.php";
    }
    


}


?>