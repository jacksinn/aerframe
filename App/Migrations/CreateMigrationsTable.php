<?php
namespace App\Migrations;

use Aer\Database\Migration;
use Aer\Database\DatabaseTable;

class CreateMigrationsTable extends Migration
{
    public static function up()
    {
        //
        $table = new DatabaseTable();
        $table->tableName = "migrations";
        $table->varchar('name', 255);
        $table->integer('migration_ran', 1);
        $table->create();
    }

    public static function down()
    {
        //
        $table = new DatabaseTable();
        $table->tableName = "migrations";
        $table->drop();
    }
}