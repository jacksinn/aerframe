<?php

namespace App\Packages\Test;

use Aer\Core\Model\AerModel;

class Test extends AerModel {
  protected static $table = 'users';
  protected static $fillable = array("name");
//    protected static $primary_key = "user_id";


}