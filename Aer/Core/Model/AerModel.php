<?php

namespace Aer\Core\Model;

//use Aer\Database\DatabaseConnection;
use Aer\Database\MysqlConnection;
use Aer\Core\Interfaces\RecordModel;

/**
 * Class AerModel
 * @package Aer\Core\Model
 */
class AerModel implements RecordModel
{
    //Table associated with the Model
    protected static $table;

    //Primary key for the table
    //@todo require primary key on table? Even lookups?
    protected static $primary_key = "id";

    //Which columns can the user write to?
    protected static $fillable;

    /**
     * @return null|string
     */
    public function json(): ?string
    {
        //Return a json encoding of the object
        //@todo add formatting difference
        return json_encode($this);
    }

    public static function all(): ?array
    {
        //Look back into why I'm doing a new static() instead of $this
        // or something else.
        $instance = new static();

        //User defined table in their model that extends AerModel
        $table = $instance::$table;

        //Grabbing the table's primary key - the user may have
        // overwritten in their model
        $primary_key = $instance::$primary_key;

        //Do I really need to do this everywhere? Can I have a
        // connection always open or is it better practice to open then
        //  close?
        $conn = MysqlConnection::connect();

        //Just your run-of-the-mill select everything from the table
        $sql = "SELECT * FROM {$table}";

        //It's query time
        $result = $conn->query($sql);

        //If it's broken, return empty array. This could probably be a
        // bit prettier.
        if(!$result){
            return array();
        }

        //What Model class is extending this class? Who Am I? Is this
        // real life?
        $class = get_class($instance);

        //Setting up an array for the results
        $result_array = array();

        //For each record we're going to create a new object of the
        // class that called this method and add the data as member
        // variables.
        //@todo let users define if they want to use their own setters? Unsure
        // @todo if I should allow that or they perform their own magic.
        foreach ($result as $record) {
            //Instantiating new object of calling class
            $obj = new $class;

            //Grabbing each column and saving the results as member
            // variables named as the column name.
            foreach ($record as $key => $val) {

                //Does the column match our primary_key? Set it as the
                // object id.
                if ($key == $primary_key) {
                    $obj->id = $val;
                }
                //Not a primary key. Or maybe it is. Whatever. Store it.
                $obj->$key = $val;
            }

            //Storing this object for later
            array_push($result_array, $obj);
        }

        //Closing SQL connection -- see note above about if I should
        // keep opening an closing the conn vs always leaving it open.
        //  Or see this note because I've said the same thing.
        MysqlConnection::close($conn);

        //An array with Model objects
        return $result_array;
    }


    public static function find(int $record_id): ?RecordModel
    {
        $instance = new static();
        $table = $instance::$table;


        $primary_key = $instance::$primary_key;

        $conn = MysqlConnection::connect();

        $sql = "SELECT *
            FROM {$table}
            WHERE {$primary_key} = {$record_id}";


        $result = $conn->query($sql);

        if(!$result){
            return null;
        }

        $class = get_class($instance);
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