<?php 

namespace Adrix\Proyecto\Model;

use Adrix\Proyecto\Utils\Utils;
use PDO;
use PDOException;


class Model{

    //Conexion que usaremos para todas las acciones
    protected $con;

    //La tabla del modelo de datos
    protected $table;

    function __construct($con)
    {
        //asignamos la conexion activa
        if ($con != null && $this->con==null) $this->con = $con;
    }
    
    function cargarTodoPaginado($num_pag, $elem_pag)
    {

        try {

            //query que muestra de forma paginada los datos
            $sql = "select * from $this->table limit :elem_pag offset :offset";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
           
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(':elem_pag', $elem_pag, PDO::PARAM_INT);
            $offset = ($elem_pag * ($num_pag - 1));
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            //Ejecutamos la sentencia substituyendo las interrogacions por los valores
            //Que metemos dentro del array que le pasamos a execute
            $resultado = $stmt->execute();

            //Si ha ido bien devolvemos los datos
            if ($resultado) return $stmt->fetchAll();
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function cargar($id)
    {
        try {

            //query que muestra de forma paginada los datos
            $sql = "select * from $this->table where id".$this->table." = :id";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           
            //Que metemos dentro del array que le pasamos a execute
            $resultado = $stmt->execute();

            //Si ha ido bien devolvemos los datos
            if ($resultado) return $stmt->fetch();
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al cargar el registro: ' . $e->getMessage();
            return false;
        }
    }


    function eliminar($id){
        try{
            $sql = "DELETE FROM $this->table WHERE id" . $this->table . " = :id";

            $stmt = $this->con->prepare($sql);

             //Asignamos la forma de devolver los datos
             $stmt->setFetchMode(PDO::FETCH_ASSOC);

             $stmt->bindParam(':id', $id, PDO::PARAM_INT);

             $stmt -> execute();

        }catch (PDOException $e) {
            echo "Error en la eliminacion de datos " . $e->getMessage();
        }
    }

    function insertar($datos)
    {
        try {

            //Vamos a hacer un ejemplo en el cual borramos el entrenador numero 4
            $sql = "INSERT INTO $this->table (";

            //Sacamos las claves que corresponden con los nombres de los campos
            $campos = array_keys($datos);

            //Primero añadimos los nombres de los campos que vienen como claves en el array asociativo
            for ($i = 0; $i < count($campos); $i++) {
                if ($i < count($campos) - 1)
                    $sql .= "$campos[$i],";
                else
                    $sql .= "$campos[$i]";
            }
            //Concatenamos la mitad de la sentencia
            $sql .= ") VALUES (";
            //Finalmente ponemos los parametros a la query
            for ($i = 0; $i < count($campos); $i++) {
                if ($i < count($campos) - 1)
                    $sql .= ":$campos[$i],";
                else
                    $sql .= ":$campos[$i]";
            }
            //Por ultimo cerramos el parentesis del VALUE
            $sql .= ")";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            echo $stmt->queryString;

            //Ejecutamos la sentencia substituyendo las interrogacions por los valores
            //Que metemos dentro del array que le pasamos a execute

            for ($i = 0; $i < count($campos); $i++) {
                //Dependiendo del tipo de dato le pongo el tipo de parametro pdo asociado
                //Usando la funcion obtenertipoparametro
                $tipo = Utils::obtenerTipoParametro($datos[$campos[$i]]);
                //gettype($datos[$campos[$i]])=="int"?PDO::PARAM_INT:PDO::PARAM_STR;
                $stmt->bindValue(':'.$campos[$i], $datos[$campos[$i]],$tipo);
            }
            $resultado = $stmt->execute($datos);

            //Devolvemos el resultado de la ejecucion de la sentencia
            return $resultado;
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al insertar el registro: ' . $e->getMessage();
            return false;
        }
    }


    function actualizar($id,$datos){
        try{
            $sql = "update $this->table SET ";
            $campos = array_keys($datos);

            for($x=0;$x<count($datos);$x++){
                if($x<count($campos)-1){
                    //Hay que pasarlo al bindvalue
                    //No hacer asi, si no con interrogacion
                    $sql .= " " . $campos[$x] . "= :"  . $campos[$x] .  " , ";
                }
                else $sql .= " " . $campos[$x] . "= :" . $campos[$x]; 
            }

            $sql .= " WHERE id" . $this->table . " = $id";

            $stmt = $this->con->prepare($sql);

            for ($i = 0; $i < count($campos); $i++) {
                //Dependiendo del tipo de dato le pongo el tipo de parametro pdo asociado
                //Usando la funcion obtenertipoparametro
                $tipo = Utils::obtenerTipoParametro($datos[$campos[$i]]);
                //gettype($datos[$campos[$i]])=="int"?PDO::PARAM_INT:PDO::PARAM_STR;
                $stmt->bindValue(':'.$campos[$i], $datos[$campos[$i]],$tipo);
            }

            $stmt -> execute();
            

        }catch(PDOException $e){
            echo "Error en la conexion";
        }
    }

    function tablasRelaciones($tablaRelacion){
        try{
            $sql = "SELECT id" .$tablaRelacion . " FROM $tablaRelacion";

            $stmt = $this->con->prepare($sql);

             //Asignamos la forma de devolver los datos
             $stmt->setFetchMode(PDO::FETCH_ASSOC);

             $stmt -> execute();

             return $stmt->fetchAll();

        }catch (PDOException $e) {
            echo "Error en la eliminacion de datos " . $e->getMessage();
        }
    }

    function obtenerDatosRelacionados($tablaPrincipal, $tablaRelacionada, $campoRelacionado,$otrocampo,$valor) {
    try {
        // Subconsulta para obtener los idTripulacion de la tabla Expedicion
        $sql = "SELECT * FROM $tablaPrincipal WHERE $campoRelacionado = (SELECT $otrocampo FROM $tablaRelacionada WHERE $otrocampo = :valor)";
        $stmt = $this->con->prepare($sql);
        
        $tipo = Utils::obtenerTipoParametro($valor);


        $stmt->bindValue(':valor', $valor,$tipo);


        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener las tripulaciones con subconsulta: " . $e->getMessage();
        return false;
    }
}

}

?>