<?php
namespace Aer\Database;


interface DatabaseConnection
{
    public static function connect();
    public static function close($connection);

}