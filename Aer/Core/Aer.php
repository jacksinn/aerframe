<?php
namespace Aer\Core;

use Aer\Database\MysqlConnection;


class Aer
{
    public static function init()
    {
        $conn = MysqlConnection::connect();
//        print_r($conn->query("SELECT * FROM users"));

//        print_r(MysqlConnection::connect());
        $config_path = __DIR__ . "/../../App/Config/config.json";
        if (!file_exists($config_path)) {
            return "Serving Aer. Please setup the config file.";
        }
    }

    public static function GetConfigurationOptions()
    {
        $config_path = __DIR__ . "/../../App/Config/config.json";
        if (!file_exists($config_path)) {
            header('Location: /install.php');
        } else {
            $config_json = json_decode(file_get_contents($config_path));
//            print_r($config_json);

            return $config_json;
        }
    }

    public static function GetDatabaseOptions(){
        return self::GetConfigurationOptions()->database;
    }

}