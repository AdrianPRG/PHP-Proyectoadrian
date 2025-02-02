<?php
namespace Adrix\Proyecto\Model;

use Adrix\Proyecto\Model\Model;


class GalaxiaModel extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "Galaxia";
    }
}
?>
