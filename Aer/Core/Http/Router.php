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
            $package = "\\" . ucfirst($_GET['package']);
            $method = $_GET['method'];
            $id = $_GET['id'];


            $controller = $package . "Controller";
            if (method_exists(static::$appPackageNamespace . $package . $controller, $method)) {
                return call_user_func(static::$appPackageNamespace . $package . $controller . "::" . $method, $id);
            }
//      else {
//        header('Location: /404.php');
//      }
            print_r($_GET);

        } else {
            return \Aer\Base\BaseController::index();

        }
    }


}