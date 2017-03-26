<?php
namespace App\Migrations;

use Aer\Database\Migration;
use Aer\Database\DatabaseTable;

class CreateArticlesTable extends Migration
{
    public static function up()
    {
        //
        $table = new DatabaseTable();
        $table->tableName = "articles";
        $table->varchar("title", 255);
        $table->varchar("byline", 255);
        $table->create();
    }

    public static function down()
    {
        //
        $table = new DatabaseTable();
        $table->tableName = "articles";
        $table->drop();
    }
}