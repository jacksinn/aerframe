<?php
namespace App\Packages\Article;

use Aer\Core\Controller\AerController;
use Aer\Core\View\View;

//use App\Packages\User\User;

class ArticleController extends AerController {

  public static function show($id) {
    return View::json(Tag::find($id));
  }

  public static function all(){
    return View::json(Tag::all());
  }

  public static function testshow($id) {
    $user = Tag::find($id);
    return View::render("Show.php", compact('user'));
  }

  public static function something($id) {
    $user = Tag::find($id);
    return View::render("All.php", compact('user'));
  }
}