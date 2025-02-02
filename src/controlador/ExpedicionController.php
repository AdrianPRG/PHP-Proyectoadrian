<?php 

namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Model\ExpedicionModel;
use Adrix\Proyecto\Utils\Utils;

class ExpedicionController{

    function MostrarExpediciones(){

        $con = Utils::getConnection();

        $expedicion = new ExpedicionModel($con);

        $expediciones =  $expedicion->cargarTodoPaginado(1,200);

        $datos = compact("expediciones");

        Utils::render("expediciones",$datos);

    }


    function MostrarExpedicion($datos){
        $con = Utils::getConnection();

        $expedicion = new ExpedicionModel($con);

        $expedicionUnica = $expedicion->cargar($datos['id']);
        $resultadosTablaRelacionada = $expedicion->obtenerDatosRelacionados("Tripulacion", "Expedicion", "idTripulacion", "Tripulacion_idTripulacion",$expedicionUnica["Tripulacion_idTripulacion"]);
                
        $datos2 = compact("resultadosTablaRelacionada");
        $resultado = compact("expedicionUnica");

        // Fusionamos ambos arrays
        $conjunto = array_merge($resultado, $datos2);

        Utils::render("expedicion",$conjunto);
    }

    function EliminarExpedicion($datos){
        $con = Utils::getConnection();

        $expedicionM = new ExpedicionModel($con);

        $expedicionM -> eliminar($datos['id']);

        Utils::redirect("/expediciones");
    }


    //Para que en el select de html solo aparezcan opciones validas,
    function DatosExpedicion(){

        $con = Utils::getConnection();

        $expedicionM = new ExpedicionModel($con);

        $resultados = $expedicionM->tablasRelaciones("Tripulacion");

        $datos = compact("resultados");        

       Utils::render("insertarExpedicion",$datos);

    }

    function InsertarExpedicion(){
        
        $con = Utils::getConnection();
        
        $expedicionM = new ExpedicionModel($con);

        $datos = $_POST;

        $expedicionM -> insertar($datos);

        Utils::redirect("/expediciones");

    }

    function DatosUpdateExpedicion($datos){

        $dato = $datos['id'];

        $resultado = compact("dato");

        Utils::render("actualizarExpedicion",$resultado);
    }

    function ActualizarExpedicion(){
        $con = Utils::getConnection();

        $resultadosupdate = ["nombreExpedicion"=>$_POST["nombreExpedicion"],"FechaExpedicion"=>$_POST["FechaExpedicion"],"Tripulacion_idTripulacion"=>$_POST["Tripulacion_idTripulacion"]];

        $id = $_POST["idActualizar"];

        $expedicionM = new ExpedicionModel($con);

        $expedicionM -> actualizar($id,$resultadosupdate);
        
        Utils::redirect("/expediciones");

        
    }

}

?>