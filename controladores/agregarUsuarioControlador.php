<?php

require '../modelo/servicioPais.php';
// require "enrutamiento.php";
$paisService = new servicioPais();
$paises = $paisService->obtenerPaises();
$subVista = "formularioCrearUsuario.php";
$vista = "crud.php";
require "../vistas/layout.php"


?>