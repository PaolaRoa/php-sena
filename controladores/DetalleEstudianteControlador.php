<?php

session_start();

if($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'profesor'){
    $id = $_GET['id'];
   
    require ('../modelo/EstudianteData.php');
    
    $datos = new EstudianteData();
    
    $estudiante = $datos->obtenerEstudiante($id);

    $vista = "crudEstudiantes.php";
    $subVista ="detalleEstudiante.php";
    require ("../vistas/layout.php");
    
}
else{
    echo "Usted no esta autorizado para acceder a este recurso";

}






?>