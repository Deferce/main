<?php
// handler accepts data from the form

//strict data type 
declare(strict_types=1);

//autoloader for classes
include_once("C:/soft/XAMPP/htdocs/oop registration form/includes/autoloader.inc.php");

if (!isset($_POST['submit'])) {

    header('Location: ../registration.php');
} else {
    //data from form
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordre = $_POST['passwordre'];
    $submit = $_POST['submit'];


    echo "You have inserted following data: " . "<br>" .
        "Username: " . $username . "<br>"
        . "Lastname: " . $lastname . "<br>"
        . "Email: " . $email . "<br>"
        . "Password: " . $password;

    //reference to the object
    $contObj = new Controller();
    $contObj->fieldValid($username, $lastname, $email, $password, $passwordre, $submit);
}
