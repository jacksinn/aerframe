<?php

namespace Aer\Core\Http;


class Router
{

    private static $appPackageNamespace = "\\App\\Packages";

    public static function get()
    {

        //PARAMETERS WE EXPECT
        //@todo add error handling
        if (!empty($_GET)) {
            //Based on the Path, See what Package We're Using
            //@todo too rigid
            $package = "\\" . ucfirst($_GET['package']);
            $method = $_GET['method'];
            $id = $_GET['id'];
            //Assuming Package is installed :/
            //@todo do some error checking and handling -- for everything
            $controller = $package . "Controller";
            if (method_exists(static::$appPackageNamespace . $package . $controller,
              $method)) {
                return call_user_func(static::$appPackageNamespace . $package . $controller . "::" . $method,
                  $id);
            }
            //Maybe reimplement this?
//      else {
//        header('Location: /404.php');
//      }
            print_r($_GET);

        } else {
            //@todo return 404 or index depending on path
            //@todo update this? Why is it fully qualified?
            return \Aer\Base\BaseController::index();

        }
    }


}