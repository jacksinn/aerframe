<?php
//@todo make sure the config file works
if(file_exists(__DIR__ . "/../App/Config/config.json")){
    header("Location: /index.php");
} else {
    //@todo write install script
    echo "INSTALL FILE";
}