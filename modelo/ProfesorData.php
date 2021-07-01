<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class ProfesorData extends Conexion
{

    public function __construct() {
        parent::__construct();
    }


    public function obtenerProfesores() {

        $consulta= $this->conexion->query('SELECT p.*, u.email FROM profesores p
                                            JOIN usuarios u
                                            ON p.idusuarios = u.idusuarios');
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

    public function obtenerProfesor($id){
        $sql = "SELECT p.*, u.email FROM profesores p
                JOIN usuarios u ON p.idusuarios = u.idusuarios
                WHERE p.idusuarios ='".$id."'";
        $consulta = $this->conexion->query($sql);
        $profesor = $consulta->fetch_all(MYSQLI_ASSOC);

        
        
        $this->conexion->close();

        return $profesor;
    }

    public function actualizarProfesor($nombre, $email, $idusuarios){
        $sqlProfesores = "UPDATE profesores SET nombre = '".$nombre."'
                          WHERE idusuarios = ".$idusuarios."";
        $resultadoProfesores = $this->conexion->query($sqlProfesores);
        $sqlUsuario = "UPDATE usuarios SET email = '".$email."' WHERE idusuarios = ".$idusuarios."";
        $resultadoUsuario = $this->conexion->query($sqlUsuario);
        return $resultadoUsuario;
        if($resultadoProfesores && $resultadoUsuario){
            $this->conexion->close();
            return true; 
         }
        else{
            $this->conexion->close();
            return false;
        }
        
    }


}


?>