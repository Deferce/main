<?php
include_once("E:/soft/xamp/htdocs/miles calc oop/includes/autoloader.inc.php");
?>
<!DOCTYPE html>
<html lang="est">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/miles%20calc%20oop/styles/style/main.css">
    <title>Miles calc</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">

        <span>
            <span><a href="http://localhost/miles%20calc%20oop/miles.php">EN</a></span>

            <span><a href="http://localhost/miles%20calc%20oop/lang/milesRU.php">RU</a></span>

            <span><a href="http://localhost/miles%20calc%20oop/lang/milesEST.php">EE</a></span>
        </span>

        <div>
            <label for="km">KM algväärtus</label>
        </div>
        <div>
            <input type="number" name="km">
        </div>
        <div>
            <label for="kmRange">KM vahemik</label>
        </div>
        <div>
            <input type="number" name="kmRange">
        </div>
        <div>
            <label for="days">Tööpäevad</label>
        </div>
        <div>
            <input type="number" name="days">
        </div>

        <div>
            <button type="submit" name="submit">Arvutama</button>
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

        if ($viewController->checkFieldEst($km, $kmRange, $days)) {
            $controller->calcEst($km, $kmRange, $days);
        }
    }

    ?>
</body>

</html>