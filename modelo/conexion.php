<?php

require('config.php');

class Conexion {

    

    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

        if ($this->conexion->connect_errno) {
            echo "Error de conexion, error..." .$this->conexion->connect_error;
        }
        $this->conexion->set_charset("utf8");
        

    }

}

?>