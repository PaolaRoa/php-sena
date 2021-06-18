<?php

require '../modelo/gestionDatos.php';




if( (isset($_POST['codigo'])) && (!empty($_POST['codigo'])) &&
    (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
    (isset($_POST['correo'])) && (!empty($_POST['correo'])) &&
    (isset($_POST['contrasena'])) && (!empty($_POST['contrasena'])) )  {

        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];

        $datos = new servicioDatos();
        
        $actualizar = $datos->actualizarUsuario($codigo,$nombre,$correo,$contrasena);

        if ($actualizar) {
                  $listar = new servicioDatos();
                   $listaUsuarios = $listar->obtenerUsuarios();
                   $subVista = "listarUsuarios.php";
                   } else {
                       $subVista = "formularioEditarUsuario.php";
                }
        } 
         else {
                
                $subVista = "formularioEditarUsuario.php"; 
        }

    $vista = "crud.php";
    require "../vistas/layout.php"

?>