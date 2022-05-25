<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/normalize.css">

    <title>Junior Test Alexey Mayboroda</title>
</head>

<body>
    <section class="topSection">
        <div>

            <h2>Product List</h2>
        </div>


    </section>
    <section class="midSection">
        <form action="./php/checkBoxValidator.php" method="post">

            <section class="topSection">
                <a href="http://localhost/web/JunTest%20scandiweb/product_add.php"><input type="button" value="Add"></a>
                <input type="submit" value="Mass Delete">
            </section>
            <?php require './php/dataFetch.php' ?>
        </form>
    </section>

    <footer>

        <h2>Scandiweb Test assignment</h2>


    </footer>

</body>

</html>