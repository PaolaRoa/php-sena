<?php
session_start();

if($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'profesor'){
    require '../modelo/EstudianteData.php';


    if( (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
        (isset($_POST['email'])) && (!empty($_POST['email'])) &&
        (isset($_POST['idusuarios'])) && (!empty($_POST['idusuarios'])) &&
        (isset($_POST['documento'])) && (!empty($_POST['documento'])) &&
        (isset($_POST['nota1']))&&
        (isset($_POST['nota2'])) &&
        (isset($_POST['nota3'])) )
         {
            
            
             $nombre=$_POST['nombre'];
             $email=$_POST['email'];
             $idusuarios=$_POST['idusuarios'];
             $documento = $_POST['documento'];
             $nota1 = $_POST['nota1'];
             $nota2 = $_POST['nota2'];
             $nota3 = $_POST['nota3'];
             $promedio = $_POST['promedio'];

            $datos = new EstudianteData();
            
            $actualizar = $datos->actualizarEstudiante($nombre, $email, $idusuarios, $nota1, $nota2, $nota3);

            if($actualizar){
                $datos = new EstudianteData();
                $listaEstudiantes = $datos->obtenerEstudiantes();
                $subVista = "listarEstudiantes.php"; 
                $vista = "crudEstudiantes.php";
                require "../vistas/layout.php";

            }
            else {
                    
                $subVista = "formularioEditarEstudiante.php"; 
                $vista = "crudEstudiantes.php";
                require "../vistas/layout.php";
            }
        
    }
    else {
                    
        $subVista = "formularioEditarEstudiante.php"; 
        $vista = "crudEstudiantes.php";
        require "../vistas/layout.php";
    }

    

}
else{
    
    echo "Usted no esta autorizado para acceder a este recurso";
}
?>