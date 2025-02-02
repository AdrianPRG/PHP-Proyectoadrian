<?php

namespace Adrix\Proyecto\Model;

use Adrix\Proyecto\Utils\Utils;
use PDO;
use PDOException;

class Usuario
{

    //Conexion que usaremos para todas las acciones
    protected $con;

    //La tabla del modelo de datos
    protected $table;

    function __construct($con)
    {
        //asignamos la conexion activa
        if ($con != null && $this->con == null) $this->con = $con;
        $this->table = "usuario";
    }


    function comprobarEmailExistente($email){
        try{
            $sql = "SELECT emailUsuario from $this->table where emailUsuario = :email";

            $stmt = $this->con->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            $stmt -> execute();

            $resultado = $stmt->fetch();

            return  $resultado !== false;
        }catch(PDOException $e){
            echo "Ha ocurrido un error inesperado " . $e->getMessage();
        }
    }

    function Registrarse($datos)
    {
        try {

            $sql = "INSERT INTO $this->table (emailUsuario, passwordUsuario) VALUES (:emailUsuario, :passwordUsuario );";

            $stmt = $this->con->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(":emailUsuario", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":passwordUsuario", $datos["password"], PDO::PARAM_STR);

            $resultado =  $stmt->execute();

            return $resultado;
        } catch (PDOException $e) {
            echo "Error al insertar los datos" . $e->getMessage();
        }
    }

    function DatosLogin($email)
    {

        try {

            $sql = "Select passwordUsuario from $this->table where emailUsuario = :email";

            //Preparamos sentencia sql
            $stmt =  $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

           $resultado =  $stmt->fetch();

            return trim($resultado["passwordUsuario"]);

        } catch (PDOException $e) {
            echo "Hubo un problema al obtener datos de usuario " . $e->getMessage();
        }
    }
}
