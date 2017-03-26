<?php

namespace App\Packages\Article;

use Aer\Core\Model\AerModel;

class Article extends AerModel {
  protected static $table = 'articles';
  protected static $fillable = array("title");
}