<?php

session_start();

if($_SESSION['rol'] == 'estudiante'){
    $id = $_GET['id'];
    $idLogueado = $_SESSION['user']['idusuarios'];
    if($id == $idLogueado){
        require ('../modelo/EstudianteData.php');
    
        $datos = new EstudianteData();
        
        $estudiante = $datos->obtenerEstudiante($id);
        $nota1 =  $estudiante[0]['nota1'];
        $nota2 =  $estudiante[0]['nota2'];
        $nota3 =  $estudiante[0]['nota3'];
        $promedio =  $estudiante[0]['promedio'];

        $vista = "notasEstudiante.php";
        
        require ("../vistas/layout.php");

    }
    
    else{
        echo "Usted no esta autorizado para acceder a este recurso";
        
    }
    
}
else{
    echo "Usted no esta autorizado para acceder a este recurso";

}






?>