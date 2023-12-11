<?php
spl_autoload_register('autoLoader');

function autoLoader($className)
{
    $url = __DIR__ . '/../classes/';
    $ext = ".class.php";

    $className = strtolower($className);
    $fullUrl = $url . $className . $ext;
    include_once($fullUrl);
}



spl_autoload_register('autoLoader');
