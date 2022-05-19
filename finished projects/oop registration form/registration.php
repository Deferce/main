<?php

declare(strict_types=1);

include_once("C:/soft/XAMPP/htdocs/oop registration form/includes/autoloader.inc.php");

var_dump($_GET);
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

    <form method="POST" action="./includes/handler.php">

        <div>
            <label>Username</label>
        </div>
        <div>
            <input type="text" name="username" value="<?php

                                                        if (isset($_GET['user']) || isset($_GET['username'])) {

                                                            echo base64_decode(urldecode($_GET['user']));
                                                        }
                                                        ?>">
        </div>
        <div class="error">
            <?php
            // if we have set GET username from handler (which using function from registration.class.php) 
            if (isset($_GET['username'])) {

                //validate get value, same on the rest
                errorValidation($_GET['username']);
            }
            ?>
        </div>
        <div>
            <label>Lastname</label>
        </div>
        <div>
            <input type="text" name="lastname" value="<?php

                                                        if (isset($_GET['last']) || isset($_GET['lastname'])) {


                                                            echo base64_decode(urldecode($_GET['last']));
                                                        }
                                                        ?>">
        </div>
        <div class=" error">
            <?php

            if (isset($_GET['lastname'])) {
                errorValidation($_GET['lastname']);
            }

            ?>
        </div>
        <div>
            <label>Email</label>
        </div>
        <div>
            <input type="email" name="email" value="<?php

                                                    if (isset($_GET['em']) || isset($_GET['em'])) {


                                                        echo base64_decode(urldecode($_GET['em']));
                                                    }

                                                    ?>">
        </div>
        <div class="error">
            <?php

            if (isset($_GET['email'])) {
                errorValidation($_GET['email']);
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

        </div>
        <div>
            <label>Password-Repeat</label>
        </div>
        <div>
            <input type="password" name="passwordre">
        </div>
        <div class="error">
            <?php

            if (isset($_GET['pass'])) {
                errorValidation($_GET['pass']);
            }

            ?>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
        <div class="error">
            <?php

            if (isset($_GET['val'])) {
                errorValidation($_GET['val']);
            }

            ?>
        </div>

        <?php
        // local error check function
        function errorValidation($val)
        {
            //check for errors
            if ($val == 'specialUser') {
                echo "Username cant contain special symbols";
            }

            if ($val == 'specialLast') {
                echo "Lastname cant contain special symbols";
            }
            if ($val == 'specialEmail') {
                echo "Email cant contain special symbols";
            }
            if ($val == 'empty') {
                echo "Please fill in all fields";
            }
            if ($val == 'same') {
                echo "username and lastname cant be the same!";
            }
            if ($val == 'max') {
                echo "Maximum allowed characters is 15";
            }
            if ($val == 'min') {
                echo "Min allowed characters are 4";
            }
            if ($val == 'numLast') {
                echo 'Lastname cant contain any numbers';
            }
            if ($val == 'proper') {
                echo "Provide email in proper format";
            }
            if ($val == 'equal') {
                echo "Password must match";
            }
        }

        ?>

    </form>



</body>

</html>