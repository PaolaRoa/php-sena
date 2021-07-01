<?php
session_start();

    if($_SESSION['rol'] != 'admin'){
        echo "Usted no esta autorizado para acceder a este recurso";
    }
    else{
        $action = $_GET['action'];

      
        require '../modelo/ProfesorData.php';


        switch ($action) {
            case 'create':
                //echo "hola case";
                showCreateForm();
                break;
            case 'list':
                listProfesors();
                break;
            default:
                echo "ups! parece que algo anda mal";
                break;
        }

    }

    function showCreateForm(){
        
        $subVista = "formularioCrearProfesor.php";
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";
    }

    function listProfesors(){
        $datos = new ProfesorData();
        $listaProfesor = $datos->obtenerProfesores();
        //var_dump($listaProfesor);
        $subVista="listarProfesores.php";
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";

    }
    
?>