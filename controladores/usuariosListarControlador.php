<?php

require '../modelo/gestionDatos.php';

$datos = new servicioDatos();

$listaUsuarios = $datos->obtenerUsuarios();



$vista = "crud.php";
$subVista = "listarUsuarios.php";
require "../vistas/layout.php"

?>