<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class EstudianteData extends Conexion
{

    public function __construct() {
        parent::__construct();
    }


    public function obtenerEstudiantes() {

        $consulta= $this->conexion->query('SELECT e.*, u.email FROM estudiantes e
                                            JOIN usuarios u
                                            ON e.idusuarios = u.idusuarios');
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;

    }


    public function validarDocumento($documento) {
        $consultaDoc= $this->conexion->query("SELECT * FROM estudiantes where documento='".$documento."'");
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
    public function crearEstudiante($documento, $email, $nombre, $clave){
        $sql = "INSERT INTO usuarios (email, clave, rol) values ('".$email."','".$clave."','3')";
        $resultado = $this->conexion->query($sql);
        //devuelve el ultimo id
        $userId =  $this->conexion->insert_id;
        $insertEstudiante = "INSERT INTO estudiantes (documento, nombre, idusuarios) VALUES ('".$documento."','".$nombre."','".$userId."')";
        $resultadoEstudiante = $this->conexion->query($insertEstudiante);
        $this->conexion->close();
        if($resultado && $resultadoEstudiante){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function obtenerEstudiante($id){
        $sql = "SELECT e.*, u.email FROM estudiantes e
                JOIN usuarios u ON e.idusuarios = u.idusuarios
                WHERE e.idusuarios ='".$id."'";
        $consulta = $this->conexion->query($sql);
        $estudiante = $consulta->fetch_all(MYSQLI_ASSOC);

        
        
        $this->conexion->close();

        return $estudiante;
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

    public function eliminarProfesor($id){

        $sql = "DELETE FROM usuarios WHERE idusuarios =".$id."";
        $resultado = $this->conexion->query($sql);
        $this->conexion->close();
        return $resultado;
    }


}


?>