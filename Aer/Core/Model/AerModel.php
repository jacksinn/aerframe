<?php
namespace Aer\Core\Model;

//use Aer\Database\DatabaseConnection;
use Aer\Database\MysqlConnection;

class AerModel
{

    //Table associated with the model
    protected static $table;
    protected static $primary_key = "id";
    protected static $fillable;

    public function json()
    {
        return json_encode($this);
    }

    public static function all()
    {
        $instance = new static();
        $table = $instance::$table;


        $primary_key = $instance::$primary_key;

        $conn = MysqlConnection::connect();

        $sql = "SELECT *
FROM {$table}";
        //        print $sql;


        $result = $conn->query($sql);
//        print_r($result);
        $class = get_class($instance);
//        print_r($class);
        $obj = new $class;

        $result_array = array();

        foreach ($result as $record) {
//            print_r($record);
            foreach ($record as $key => $val) {
//                print $key;
                if ($key == $primary_key) {
                    $obj->id = $val;
                }
                $obj->$key = $val;
            }
            array_push($result_array, $obj);
        }

//        print_r($obj);

        MysqlConnection::close($conn);
        return $result_array;
    }


    public static function find($record_id)
    {
        $instance = new static();
        $table = $instance::$table;


        $primary_key = $instance::$primary_key;

        $conn = MysqlConnection::connect();

        $sql = "SELECT *
FROM {$table}
WHERE {$primary_key} = {$record_id}";
//        print $sql;


        $result = $conn->query($sql);
//        print_r($result);
        $class = get_class($instance);
//        print_r($class);
        $obj = new $class;


        foreach ($result as $record) {
//            print_r($record);
            foreach ($record as $key => $val) {
//                print $key;
                if ($key == $primary_key) {
                    $obj->id = $val;
                }
                $obj->$key = $val;
            }
        }

//        print_r($obj);

        MysqlConnection::close($conn);
        return $obj;
    }

}