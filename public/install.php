<?php
if(file_exists(__DIR__ . "/../App/Config/config.json")){
    header("Location: /index.php");
} else {
    echo "INSTALL FILE";
}