<?php

include_once("./autoloader.inc.php");

if (!isset($_POST['submit'])) {
    header('Location: ../login.php');
} else {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    $vew = new Viewer();
    $vew->login($email, $password, $submit);

  
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
<a class='btn' href="../registration.php">Press Here for Register Page</a>
</body>
</html>