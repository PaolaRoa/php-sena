<?php
    
    require '../modelo/gestionDatos.php';

    $clave = $_POST['clave'];
    $email = $_POST['email'];

    $servicioDatos = new servicioDatos();

    $resultado = $servicioDatos->validarUsuario($email, $clave);

    if(count($resultado) > 0){

        session_start();
        //asigna las variables de sesion
        $servicioDatos->setSession($resultado[0]['rol'],$resultado[0]['idusuarios']);
        $vista = "bienvenido.php";
    }
    else{

        $errorMsg = "por favor verifique sus credenciales";
        $vista = "home.php";
       
    }
    require "../vistas/layout.php";

?>