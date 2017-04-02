<?php


 // Grab the autoloader
require __DIR__.'/../../vendor/autoload.php';

use Aer\Core\Aer;
use Aer\Core\Http\Router;

// Initialize
print Aer::init();

// Grab the router
print Router::get();
