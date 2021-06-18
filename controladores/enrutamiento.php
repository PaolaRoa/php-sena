<?php

require '../modelo/gestionDatos.php';


class enrutamiento {

    public function Ruta($i) {

        switch($i) {
            case 0:
                $v="home.php";
                break;
            case 1:
                $v="nosotros.php";
                break;
            case 2:
                $v="productos.php";
                break;
            case 3:
                $v="crud.php";
                break;
            default:
                $v="home.php";
                break;
        }

       return $v;
    }


    public function SubRuta($i) {



        switch($i) {
            case 0:
                $v="mision.php";
                break;
            case 1:
                $v="vision.php";
                break;
            case 2:
                $v="empresa.php";
                break;
            case 3:
                $v="formulario.php";
                break;
            case 4:
                 $v="tabla.php";
                break;
            case 31:
                    $v="formularioCrearUsuario.php";
                   break;
            default:
                $v="mision.php";
                break;
            // sub rutas del crud
            ;
        }

       return $v;
    }

    public function crearUsuarioForm(){
        $datos = new servicioPais();
    $paises = $datos->obtenerPaises();
    }


}


?>