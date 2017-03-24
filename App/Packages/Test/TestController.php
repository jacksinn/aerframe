<?php
namespace App\Packages\Test;

use Aer\Core\Controller\AerController;
//use App\Modules\Test\Test;

class TestController extends AerController {

  public static function show($id) {
    return Test::find($id);
  }

  public static function all(){
    return Test::all();
  }
}