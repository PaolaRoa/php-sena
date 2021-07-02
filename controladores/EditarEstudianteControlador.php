<?php
session_start();

if($_SESSION['rol'] == 'admin' || $_SESSION['rol']== 'profesor'){
    $id = $_GET['id'];
        require ('../modelo/EstudianteData.php');
    $datos = new EstudianteData();
    $estudiante = $datos->obtenerEstudiante($id);


    foreach ($estudiante  as $e) {
        $documento = $e['documento'];
        $nombre = $e['nombre'];
        $email = $e['email'];
        $idusuarios = $e['idusuarios'];
        $nota1 = $e['nota1'];
        $nota2 = $e['nota2'];
        $nota3 = $e['nota3'];
        $promedio = $e['promedio'];
    }
    
    $vista = "crudEstudiantes.php";
    $subVista ="formularioEditarEstudiante.php";
    require ("../vistas/layout.php");
    
}
else{

    echo "Usted no esta autorizado para acceder a este recurso";
}






/*
echo "<pre>";
echo var_dump($usuario);
echo "</pre>";
*/






?>