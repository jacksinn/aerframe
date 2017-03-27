<?php
namespace Aer\Base;

use Aer\Core\Controller\AerController;
use Aer\Core\View\View;

//use App\Packages\User\User;

class BaseController extends AerController {

  public static function index() {
    return View::render("Start.php");
//    print "asdlfasd";
  }
}