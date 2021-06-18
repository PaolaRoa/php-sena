<?php

require '../modelo/gestionDatos.php';

$codigo=$_POST['codigo'];


$datos = new servicioDatos();

$borrar = $datos->borrarUsuario($codigo);


$listar = new servicioDatos();
$listaUsuarios = $listar->obtenerUsuarios();
$subVista = "listarUsuarios.php";
$vista = "crud.php";
require "../vistas/layout.php"

?>