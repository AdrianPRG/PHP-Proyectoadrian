<?php 
namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Model\DescubrimientoModel;
use Adrix\Proyecto\Utils\Utils;

class DescubrimientoController{

    function MostrarDescubrimientos(){

        $con = Utils::getConnection();

        $descubrimiento = new DescubrimientoModel($con);

        $descubrimientos =  $descubrimiento->cargarTodoPaginado(1,200);

        $datos = compact("descubrimientos");

        Utils::render("descubrimientos",$datos);

    }

}


?>