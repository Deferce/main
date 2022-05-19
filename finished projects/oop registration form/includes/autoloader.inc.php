<?php
spl_autoload_register('autoLoader');

function autoLoader($className)
{
    $url = "C:/soft/XAMPP/htdocs/oop registration form/classes/";
    $ext = ".class.php";
    $fullUrl = $url . $className . $ext;
    include_once($fullUrl);
}
