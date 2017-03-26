<?php
namespace App\Packages\Article;

use Aer\Core\Controller\AerController;
use Aer\Core\View\View;

//use App\Packages\User\User;

class ArticleController extends AerController {

  public static function show($id) {
    return View::json(Article::find($id));
  }

  public static function all(){
    return View::json(Article::all());
  }

  public static function testshow($id) {
    $user = Article::find($id);
    return View::render("Show.php", compact('user'));
  }

  public static function something($id) {
    $user = Article::find($id);
    return View::render("All.php", compact('user'));
  }
}