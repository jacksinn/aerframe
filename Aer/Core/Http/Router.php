<?php

namespace Aer\Core\Http;

use Aer\Base\BaseController;


class Router
{

    private static $appPackageNamespace = "\\App\\Packages";

    public static function get()
    {

        //PARAMETERS WE EXPECT
        //@todo add error handling
        if (!empty($_GET)) {
            //Based on the Path, See what Package We're Using
            //Papa like to initialize things
            $package = null;
            $method = null;
            $id = null;
            $controller = null;
            if (isset($_GET['package'])) {
                //Uppercasing the first letter so later
                //We can add it to "Controller" to get the Controller
                //File Name
                $package = "\\" . ucfirst($_GET['package']);
                $controller = $package . "Controller";
            }
            if (isset($_GET['method'])) {
                //Controller Method to access
                $method = $_GET['method'];
            }
            if (isset($_GET['id'])) {
                //Record ID to fetch
                $id = $_GET['id'];
            }

            if (method_exists(static::$appPackageNamespace . $package . $controller,
              $method)) {
                return call_user_func(static::$appPackageNamespace . $package . $controller . "::" . $method,
                  $id);
            } else {
                header('Location: /404.php');
            }
        } else {
            return BaseController::index();

            //header('Location: /index.php');
        }
    }


}