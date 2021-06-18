<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class servicioPais extends Conexion
{

    public function __construct() {
        parent::__construct();
    }


    public function obtenerPaises() {

        $consulta= $this->conexion->query('SELECT * FROM paises');
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;

    }


    

}


?>