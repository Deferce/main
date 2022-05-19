<?php

spl_autoload_register('autoLoader');

function autoLoader($class)
{
    $start = "E:/soft/xamp/htdocs/miles calc oop/classes/";
    $end = ".class.php";

    $fullUrl = $start . $class . $end;

    include_once($fullUrl);
}
