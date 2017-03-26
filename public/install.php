<?php
//Gotta have this autoload here since we aren't bootstrapping the site
require __DIR__.'/../vendor/autoload.php';

use App\Migrations\CreateArticlesTable;
use App\Migrations\CreateMigrationsTable;
use App\Migrations\CreateUsersTable;

if(file_exists(__DIR__ . "/../App/Config/config.json")){
    //@todo MAKE SURE AER ISN'T ALREADY INSTALLED!!!!!!!!!
    //Right now I'm just running it without error checking because I
    // tear down and build it up so much
    //@todo add installation as an Aer Console command
    //@todo add profile manifests so users can install a cms or other service

    //If already installed, redirect to home page -or- we can put in a
    // notification that it's already installed and to proceed at
    //  their own peril.
    //header("Location: /index.php");

    //Ok Let's do some migrations
    //echo "Adding Migrations table...<hr>";
    //echo CreateMigrationsTable::up();
    //
    ////@todo see if the user wants to install some common packages like User
    //echo "Adding User table...<hr>";
    //echo CreateUsersTable::up();
    echo "Adding Articles table...<hr>";
    echo CreateArticlesTable::up();

} else {
    echo "You need to create a config.json first.";

}