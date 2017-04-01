<?php

namespace App\Packages\Tag;

use Aer\Core\Model\AerModel;

class Tag extends AerModel {
  protected static $table = 'tags';
  protected static $fillable = array("title");
}