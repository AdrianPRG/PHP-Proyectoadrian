<?php 
namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Model\GalaxiaModel;
use Adrix\Proyecto\Model\TripulacionModel;
use Adrix\Proyecto\Utils\Utils;

class TripulacionController{


    function MostrarTripulaciones(){

        $con = Utils::getConnection();

        $tripulacion = new TripulacionModel($con);

        $tripulaciones =  $tripulacion->cargarTodoPaginado(1,200);

        $datos = compact("tripulaciones");

        Utils::render("tripulaciones",$datos);

    }
    


}


?>