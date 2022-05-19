<?php
include_once("C:/soft/XAMPP/htdocs/oop registration form/includes/autoloader.inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>

    <form method="POST" action="./includes/loginHandler.php">
        <div>
            <label>Email</label>
        </div>
        <div>
            <input type="email" name="email">
        </div>
        <div class="error">
            <?php
            if (isset($_GET['email'])) {
                if ($_GET['email'] == 'specialEmail') {
                    echo "Email cant contain special symbols";
                }
                if ($_GET['email'] == 'proper') {
                    echo "Please provide proper email";
                }
            }
            ?>
        </div>
        <div>
            <label>Password</label>
        </div>
        <div>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
        <div class="error">
            <?php
            if (isset($_GET['error'])) {
                echo "Wrong Credentials try again";
            }
            if (isset($_GET['val'])) {
                if ($_GET['val'] == 'empty') {
                    echo "Fields cannot be empty";
                }
                if ($_GET['val'] == 'max') {
                    echo "Fields cannot be more than 15 characters";
                }
                if ($_GET['val'] == 'min') {
                    echo "Fields cannot be less than 4 symbols";
                }
                if ($_GET['val'] == 'same') {
                    echo "Email and password cannot be the same";
                }
            }
            ?>
        </div>

    </form>


</body>

</html>