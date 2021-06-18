<?php

$id = $_GET['id'];
//echo "ID o CODIGO recivido = ", $id ;

require ('../modelo/gestionDatos.php');
$datos = new servicioDatos();
$usuario = $datos->consultarUsuario($id);
/*
echo "<pre>";
echo var_dump($usuario);
echo "</pre>";
*/

$vista = "crud.php";
$subVista ="detalleUsuario.php";
require ("../vistas/layout.php");




?>