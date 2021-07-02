<?php
session_start();
   
    if($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'profesor'){
        $action = $_GET['action'];

      
        require '../modelo/EstudianteData.php';


        switch ($action) {
            case 'create':
                showCreateForm();
                break;
            case 'list':
                listEstudiantes();
                break;
            default:
                echo "ups! parece que algo anda mal";
                break;
        }
    }
    else{
        echo "rol".$_SESSION['rol']."rol";
        echo "Usted no esta autorizado para acceder a este recurso";
    }

    function showCreateForm(){
        
        $subVista = "formularioCrearEstudiante.php";
        $vista = "crudEstudiantes.php";
        require "../vistas/layout.php";
    }

    function listEstudiantes(){
        $datos = new EstudianteData();
        $listaEstudiantes = $datos->obtenerEstudiantes();
        $subVista="listarEstudiantes.php";
        $vista = "crudEstudiantes.php";
        require "../vistas/layout.php";

    }
    
?>