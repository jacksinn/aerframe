<?php

namespace App\Packages\User;

use Aer\Core\Model\AerModel;

class User extends AerModel {
  protected static $table = 'users';
  protected static $fillable = array("name");
//    protected static $primary_key = "user_id";


}