<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class ProfesorData extends Conexion
{

    public function __construct() {
        parent::__construct();
    }


    public function obtenerProfesores() {

        $consulta= $this->conexion->query('SELECT * FROM profesores');
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;

    }


    public function validarDocumento($documento) {
        $consultaDoc= $this->conexion->query("SELECT * FROM profesores where documento='".$documento."'");
        $resultadoDoc= $consultaDoc->fetch_all(MYSQLI_ASSOC);

        if ($resultadoDoc)
           return false;
           else
           return true;

    }
    public function validarEmail($email) {
        $consultaEmail= $this->conexion->query("SELECT * FROM usuarios where email='".$email."'");
        $resultadoEmail = $consultaEmail->fetch_all(MYSQLI_ASSOC);
        
        if ($resultadoEmail){
            return false;
        }else{
            return true;
        }
    }
    public function crearProfesor($documento, $email, $nombre, $clave){
        $sql = "INSERT INTO usuarios (email, clave, rol) values ('".$email."','".$clave."','2')";
        $resultado = $this->conexion->query($sql);
        //devuelve el ultimo id
        $userId =  $this->conexion->insert_id;
        $insertProfesor = "INSERT INTO profesores (documento, nombre, idusuarios) VALUES ('".$documento."','".$nombre."','".$userId."')";
        $resultadoProfesor = $this->conexion->query($insertProfesor);
        $this->conexion->close();
        if($resultado && $resultadoProfesor){
            return true;
        }
        return false;
    }


}


?>