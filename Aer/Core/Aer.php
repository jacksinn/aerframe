<?php
namespace Aer\Core;

use Aer\Database\MysqlConnection;


class Aer
{
    public static $config_path = __DIR__ . "/../../App/Config/config.json";

    public static function init()
    {
        //@todo why was i doing a $conn here?
        $conn = MysqlConnection::connect();

        if (!file_exists(self::$config_path)) {
            return "Serving Aer. Please setup the config file.";
        }
    }

    //@todo return json or null, other methods should handle the response, not her. smells.
    public static function GetConfigurationOptions()
    {
        if (!file_exists(self::$config_path)) {
            header('Location: /install.php');
        } else {
            $config_json = json_decode(file_get_contents(self::$config_path));
            return $config_json;
        }
    }

    public static function GetDatabaseOptions(){
        return self::GetConfigurationOptions()->database;
    }

}