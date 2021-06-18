<?php

$id = $_GET['id'];
//echo "ID o CODIGO recivido = ", $id ;

require ('../modelo/gestionDatos.php');
$datos = new servicioDatos();
$usuario = $datos->consultarUsuario($id);



foreach ($usuario  as $u) {
    $codigo = $u['codigo'];
    $nombre = $u['nombre'];
    $correo = $u['correo'];
    $contrasena = $u['contrasena'];
}





/*
echo "<pre>";
echo var_dump($usuario);
echo "</pre>";
*/

$vista = "crud.php";
$subVista ="formularioEditarUsuario.php";
require ("../vistas/layout.php");




?>