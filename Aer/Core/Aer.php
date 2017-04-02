<?php
namespace Aer\Core;

use Aer\Database\MysqlConnection;


class Aer
{
    //Where our configuration file lives
    //@todo - combine this with .env?
    public static $config_path = __DIR__ . "/../../App/Config/config.json";

    public static function init()
    {
        //Setting up db conn - does this mean I can avoid using it in
        // other function calls?
        //@todo why was i doing a $conn here? to initialize?
        $conn = MysqlConnection::connect();

        //Config file not setup, send message
        //@todo maybe throw exception? Should I except all the things?
        if (!file_exists(self::$config_path)) {
            return "Serving Aer. Please setup the config file.";
        }
    }

    //@todo return json or null, other methods should handle the response, not her. smells.
    public static function GetConfigurationOptions()
    {
        //Ok so I'm handling this up above in init and here - I
        // shouldn't have multiple places doing the same check or at
        //  the very least I should standardize it
        if (!file_exists(self::$config_path)) {
            header('Location: /install.php');
        } else {
            //Decoding the json in the config file
            //@todo return type is mixed, I'd like to guarantee what gets returned
            $config_json = json_decode(file_get_contents(self::$config_path));
            return $config_json;
        }
    }

    public static function GetDatabaseOptions(){
        //Right now this method is grabbing all the options and just
        // returning the database option. Should I handle that in the
        //  GetConfigurationOptions method with a parameter?
        return self::GetConfigurationOptions()->database;
    }

}