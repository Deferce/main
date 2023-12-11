<?php
function autoLoader($class)
{
    $start = __DIR__ . '/../classes/';
    $end = ".class.php";

    // Convert the class name to lowercase to handle case sensitivity
    $class = strtolower($class);

    $fullUrl = $start . $class . $end;

    if (file_exists($fullUrl)) {
        include_once($fullUrl);
    } else {
        echo "File does not exist: $fullUrl";
    }
}

spl_autoload_register('autoLoader');
