<?php

include_once("C:/soft/XAMPP/htdocs/oop registration form/includes/autoloader.inc.php");

if (!isset($_POST['submit'])) {
    header('Location: ../login.php');
} else {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    $vew = new Viewer();
    $vew->login($email, $password, $submit);
}
