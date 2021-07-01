<?php

session_start();

if($_SESSION['rol'] != 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{
    $id = $_GET['id'];
   
    require ('../modelo/ProfesorData.php');
    
    $datos = new ProfesorData();
    
    $profesor = $datos->obtenerProfesor($id);

    $vista = "crudProfesores.php";
    $subVista ="detalleProfesor.php";
    require ("../vistas/layout.php");

}






?>