<?php
namespace Aer\Database;


interface DatabaseConnection
{
    public static function connect();
    //This shouldn't necessarily be a mysqli connection but I'm only
    // using MySQL right now and I want to type-hint it.
    public static function close(\mysqli $connection);
}