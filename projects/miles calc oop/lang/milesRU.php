<?php
include_once("../includes/autoloader.inc.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/style/main.css">
    <title>Калькулятор КМ</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">

        <span>
            <span><a href="../miles.php">EN</a></span>

            <span><a href="./milesRU.php">RU</a></span>

            <span><a href="./milesEST.php">ET</a></span>
        </span>

        <div>
            <label for="km">Начальное значение в КМ</label>
        </div>
        <div>
            <input type="number" name="km">
        </div>
        <div>
            <label for="kmRange">Расстояние в КМ</label>
        </div>
        <div>
            <input type="number" name="kmRange">
        </div>
        <div>
            <label for="days">Количество рабочих дней</label>
        </div>
        <div>
            <input type="number" name="days">
        </div>

        <div>
            <button type="submit" name="submit">Рассчитать</button>
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

        if ($viewController->checkFieldRu($km, $kmRange, $days)) {
            $controller->calcRu($km, $kmRange, $days);
        }
    }

    ?>
</body>

</html>