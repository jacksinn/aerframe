<?php

namespace Aer\Database;

use Aer\Core\Aer;


class MysqlConnection implements DatabaseConnection
{


    public static function connect(): ?\mysqli {
        //Getting database section from the config.json file
        $database_options = Aer::GetDatabaseOptions();

        //Setting up the host from the config.json and appending a port
        // to it if one is passed in the json
        $host = $database_options->host;
        if($database_options->port != null){
            $host .= ":" . $database_options->port;
        }

        //Make that database connection
        $conn = new \mysqli(
            $database_options->host,
            $database_options->username,
            $database_options->password,
            $database_options->database
        );

        //The database connection encountered an error. Probably wrong
        // credentials or the database doesn't exist.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Return that database connection
        return $conn;
    }

    public static function close(\mysqli $connection){
        $connection->close();
    }

}