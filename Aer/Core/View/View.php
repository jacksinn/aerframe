<?php

namespace Aer\Core\View;


class View {

  public static function render($template, array $vars = null, string $template_path = null){
    $path_arr = explode("/", debug_backtrace()[0]['file']);
    $calling_contoller = array_pop($path_arr);

    //@todo im not sure this is how i should be doing this
    $template_path = implode("/", $path_arr);
    $template_path .= "/Theme/$template";
    ob_start();
    require $template_path;
    $view = ob_get_contents();
    ob_end_clean();
    return $view;
  }

  public static function json($vars){
    return print_r(json_encode($vars), true);
  }

}