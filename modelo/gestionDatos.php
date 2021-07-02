<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class servicioDatos extends Conexion
{

    public function __construct() {
        parent::__construct();
    }



    public function validarUsuario($email, $clave){

        $sql = "SELECT email, rol, idusuarios 
                FROM usuarios
                WHERE email='".$email."'
                AND clave='".$clave."'"; 

        $query = $this->conexion->query($sql);

        $resultado = $query->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    public function setSession($rol, $idusuario){

        switch ($rol) {
            case '1':
                $_SESSION['rol'] = "admin";
                $_SESSION['user'] = $this->getProfesor($idusuario)[0];
                break;
            case '2':
                $_SESSION['rol'] = "profesor";
                $_SESSION['user'] = $this->getProfesor($idusuario)[0];
                break;
            case '3':
                $_SESSION['rol'] = "estudiante";
                $_SESSION['user'] = $this->getEstudiante($idusuario)[0];
                break;         
        }

    }

    public function getProfesor($id){

        $sql = "SELECT *
        FROM profesores
        WHERE idusuarios='".$id."'"; 

        $query = $this->conexion->query($sql);

        $resultado = $query->fetch_all(MYSQLI_ASSOC);

        return $resultado;

    }
    public function getEstudiante($id){

        $sql = "SELECT *
        FROM estudiantes
        WHERE idusuarios='".$id."'"; 

        $query = $this->conexion->query($sql);

        $resultado = $query->fetch_all(MYSQLI_ASSOC);

        return $resultado;

    }

    


}


?>