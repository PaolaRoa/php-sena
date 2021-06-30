<?php
    $action = $_GET['action'];

    switch ($action) {
        case 'create':
        showCreateForm();
            break;
        default:
            echo "hola";
            break;
    }


    function showCreateForm(){
        
    
        $subVista = "formularioCrearProfesor.php";
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";
    }
?>