<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2; url = http://localhost/web/JunTest%20scandiweb/main.php" />
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
$dvdSize = $_POST["SIZE"];
$furnitureHeight = $_POST["HEIGHT"];
$furnitureWidth = $_POST["WIDTH"];
$furnitureLength = $_POST["LENGTH"];
$bookWeight = $_POST["WEIGHT"];



//////////////////////////////////////////////////////////////////////////////////////////////
//Sending queries into DB 

switch ($selector) {

    case $selector == "DVD":

        $sql = "INSERT INTO products.dvd (sku,name,price,size) VALUES ('$sku','$name','$price','$dvdSize')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into DVD</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }
        break;
    case $selector == "BOOK":

        $sql = "INSERT INTO products.book (sku,name,price,weight) VALUES ('$sku','$name','$price','$bookWeight')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into BOOK</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }

        break;
    case $selector == "FURNITURE":

        $sql = "INSERT INTO products.furniture (sku,name,price,height,width,length) VALUES ('$sku','$name','$price','$furnitureHeight','$furnitureWidth','$furnitureLength')";

        if (mysqli_query($DBconnect, $sql)) {
            echo "<div id='connectionDbStatus'>Data inserted into FURNITURE</div></br>";
        } else {
            echo "<div id='connectionDbStatusEr'>Failed to connect to MYSQL</div></br>"  . mysqli_connect_error();
            exit();
        }
        break;
}

/////////////////////////////////////////////////////////////////////////////////////////////////
