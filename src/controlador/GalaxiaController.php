<?php 
namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Model\GalaxiaModel;
use Adrix\Proyecto\Utils\Utils;

class GalaxiaController{


    function MostrarGalaxias(){

        $con = Utils::getConnection();

        $galaxia = new GalaxiaModel($con);

        $galaxias =  $galaxia->cargarTodoPaginado(1,200);

        $datos = compact("galaxias");

        Utils::render("galaxias",$datos);

    }
    


}


?>