<?php

namespace Aer\Database;

use Aer\Core\Aer;


class MysqlConnection implements DatabaseConnection
{


    public static function connect(){
        $database_options = Aer::GetDatabaseOptions();

        $host = $database_options->host;
        if($database_options->port != null){
            $host .= ":" . $database_options->port;
        }
        $conn = new \mysqli(
            $database_options->host,
            $database_options->username,
            $database_options->password,
            $database_options->database
        );
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function close($connection){
        $connection->close();
    }

}