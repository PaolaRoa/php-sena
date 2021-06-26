<?php
    
    require '../modelo/gestionDatos.php';

    $clave = $_POST['clave'];
    $email = $_POST['email'];

    $servicioDatos = new servicioDatos();

    $resultado = $servicioDatos->validarUsuario($email, $clave);

    if(count($resultado) > 0){
        echo "validado";
    }
    else{

        $errorMsg = "por favor verifique sus credenciales";
        $vista = "home.php";
        require "../vistas/layout.php";
    }


?>