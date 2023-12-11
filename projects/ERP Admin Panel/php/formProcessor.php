<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../main.php" />


    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/normalize.css">

</head>

<body>
    <?php require './connect.php'; ?>
</body>

</html>

<?php

//Getting values from post submitted via form
$sku = $_POST["sku"];
$name = $_POST["name"];
$price = $_POST["price"];
$selector = $_POST["typeSwitcher"];



//////////////////////////////////////////////////////////////////////////////////////////////
//Sending queries into DB 

switch ($selector) {

    case "DVD":

        $sql = "INSERT INTO if0_35502129_products.dvd (sku,name,price,size) VALUES ('$sku','$name','$price','$_POST[SIZE]')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into DVD</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }
        break;
    case "BOOK":

        $sql = "INSERT INTO if0_35502129_products.book (sku,name,price,weight) VALUES ('$sku','$name','$price','$_POST[WEIGHT]')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into BOOK</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }

        break;
    case "FURNITURE":

        $sql = "INSERT INTO if0_35502129_products.furniture (sku,name,price,height,width,length) VALUES ('$sku','$name','$price','$_POST[HEIGHT]','$_POST[WIDTH]','$_POST[LENGTH];')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into FURNITURE</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }
        break;
    default:
        echo "no match";
}
