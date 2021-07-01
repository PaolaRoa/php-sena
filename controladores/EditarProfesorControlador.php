<?php
session_start();

if($_SESSION['rol'] != 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{

    $id = $_GET['id'];
    //echo "ID o CODIGO recivido = ", $id ;

    require ('../modelo/ProfesorData.php');
    $datos = new ProfesorData();
    $profesor = $datos->obtenerProfesor($id);



    foreach ($profesor  as $p) {
        $documento = $p['documento'];
        $nombre = $p['nombre'];
        $email = $p['email'];
        $idusuarios = $p['idusuarios'];
    }
    
    $vista = "crudProfesores.php";
    $subVista ="formularioEditarProfesor.php";
    require ("../vistas/layout.php");
}






/*
echo "<pre>";
echo var_dump($usuario);
echo "</pre>";
*/






?>