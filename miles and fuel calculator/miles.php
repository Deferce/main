<?php
include_once("./includes/autoloader.inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <title>Miles calc</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">

        <span>
            <span><a href="./miles.php">EN</a></span>

            <span><a href="./lang/milesRU.php">RU</a></span>

            <span><a href="./lang/milesEST.php">EE</a></span>
        </span>

        <div>
            <label for="km">Initial KM value</label>
        </div>
        <div>
            <input type="number" name="km">
        </div>
        <div>
            <label for="kmRange">KM range</label>
        </div>
        <div>
            <input type="number" name="kmRange">
        </div>
        <div>
            <label for="days">Days of work</label>
        </div>
        <div>
            <input type="number" name="days">
        </div>

        <div>
            <button type="submit" name="submit">Calculate</button>
        </div>

    </form>

    <?php

    if (isset($_POST['submit'])) {
        $km = $_POST['km'];
        $kmRange = $_POST['kmRange'];
        $days = $_POST['days'];

        $calc = new Calculate($km, $kmRange, $days);

        $viewController = new Viewcontroller($km, $kmRange, $days);
        $controller = new Controller($km, $kmRange, $days);

        if ($viewController->checkField($km, $kmRange, $days)) {
            $controller->calc($km, $kmRange, $days);
        }
    }

    ?>
</body>

</html>