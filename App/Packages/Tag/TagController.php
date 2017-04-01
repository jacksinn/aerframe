<?php
namespace App\Packages\Tag;

use Aer\Core\Controller\AerController;
use Aer\Core\View\View;

//use App\Packages\User\User;

class TagController extends AerController {

  public static function show(int $id) {
    return View::json(Tag::find($id));
  }

  public static function all(){
    return View::json(Tag::all());
  }

  public static function testshow(int $id) {
    $user = Tag::find($id);
    return View::render("Show.php", compact('user'));
  }

  public static function something(int $id) {
    $user = Tag::find($id);
    return View::render("All.php", compact('user'));
  }
}