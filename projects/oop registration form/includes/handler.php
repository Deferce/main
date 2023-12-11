<?php
// handler accepts data from the form

//strict data type 
declare(strict_types=1);

//autoloader for classes
include_once("./autoloader.inc.php");

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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <a class='btn' href="../login.php">Press Here to Login</a>
</body>

</html>