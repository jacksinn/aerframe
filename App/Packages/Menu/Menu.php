<?php

namespace App\Packages\Menu;

use Aer\Core\Model\AerModel;

class Menu extends AerModel
{

    protected static $table = 'menus';
    protected static $fillable = array("parent_id", "name", "url");

}