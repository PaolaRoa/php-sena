<?php
session_start();

if($_SESSION['rol'] != 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{
    require '../modelo/ProfesorData.php';


    if( (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
        (isset($_POST['email'])) && (!empty($_POST['email'])) &&
        (isset($_POST['idusuarios'])) && (!empty($_POST['idusuarios'])) )  {
            
             $nombre=$_POST['nombre'];
             $email=$_POST['email'];
             $idusuarios=$_POST['idusuarios'];
             


            $datos = new ProfesorData();
            
            $actualizar = $datos->actualizarProfesor($nombre, $email, $idusuarios);

            if($actualizar){
                $datos = new ProfesorData();
                $listaProfesor = $datos->obtenerProfesores();
                $subVista = "listarProfesores.php"; 
                $vista = "crudProfesores.php";
                require "../vistas/layout.php";

            }
            else {
                    
                $subVista = "formularioEditarProfesor.php"; 
                $vista = "crudProfesores.php";
                require "../vistas/layout.php";
            }
        
    }
    else {
                    
        $subVista = "formularioEditarProfesor.php"; 
        $vista = "crudProfesores.php";
        require "../vistas/layout.php";
    }

    

}
?>