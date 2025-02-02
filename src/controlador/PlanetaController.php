<?php 
namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Model\PlanetaModel;
use Adrix\Proyecto\Utils\Utils;

class PlanetaController{

    function hola(){
        echo "hola";
    }

    function MostrarPlanetas(){

        $con = Utils::getConnection();

        $planeta = new PlanetaModel($con);

        $planetas =  $planeta->cargarTodoPaginado(1,200);

        $datos = compact("planetas");

        Utils::render("planetas",$datos);

    }
    


}


?>