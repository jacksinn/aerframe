<?php
namespace App\Packages\User;

use Aer\Core\Controller\AerController;
use Aer\Core\View\View;

//use App\Packages\User\User;

class UserController extends AerController {

  public static function show($id) {
    return View::json(User::find($id));
  }

  public static function all(){
    return View::json(User::all());
  }

  public static function testshow($id) {
    $user = User::find($id);
    return View::render("Show.php", compact('user'));
  }

  public static function something($id) {
    $user = User::find($id);
    return View::render("All.php", compact('user'));
  }
}