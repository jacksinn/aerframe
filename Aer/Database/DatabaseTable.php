<?php


namespace Aer\Database;
use Aer\Database\MysqlConnection;

class DatabaseTable
{
    public $tableName;
    private $columns = array();

    public function create(){
        //Making this connection I make everywhere. Seriously, stop
        // what you're doing and see if this makes sense to others.
        $conn = MysqlConnection::connect();

        $sql = "create table if not exists " . $this->tableName;

        $columns_sql_arr = array();
        $sql_pk = "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        foreach($this->columns as $column){
//            print_r($column);
            array_push($columns_sql_arr, $column['name'] . " " . $column['type'] . "(" . $column['length'] . ")");
        }
        $columns_sql = implode(", ", $columns_sql_arr);
//        print $columns_sql;
        $create = $sql . " (" . $sql_pk . ", " . $columns_sql . ")";
        $conn->query($create);
        MysqlConnection::close($conn);
    }

    public function drop(){
        $sql = "drop table if exists " . $this->tableName;
//        print $sql;
        $conn = MysqlConnection::connect();
        $conn->query($sql);
        MysqlConnection::close($conn);
    }

    public function addColumn(string $type, string $name, int $length){
        $column = array('type' => $type, 'name' => $name, 'length' => $length);
        array_push($this->columns, $column);
    }

    public function varchar(string $name, int $length){
        $this->addColumn('varchar', $name, $length);
    }

    public function integer(string $name, int $length){
        $this->addColumn('integer', $name, $length);
    }

    public function boolean(string $name){
        $this->addColumn('boolean', $name, 0);
    }

}