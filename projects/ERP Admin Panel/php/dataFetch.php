<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>

</html>
<?php
require './php/connect.php';

//////////////////////////////////////////////////////////////////////////////////////////////
//Selecting database, user etc for information display
//$selectDB = mysqli_select_db($DBconnect, "products");

$currentDatabase = 'SELECT DATABASE()';
$currentUser = 'SELECT CURRENT_USER()';

$queryUser = mysqli_query($DBconnect, $currentUser);
$queryDatabase = mysqli_query($DBconnect, $currentDatabase);

$fetchUser = mysqli_fetch_array($queryUser);
$fetchDatabase = mysqli_fetch_array($queryDatabase);

if (!mysqli_select_db($DBconnect, "if0_35502129_products")) {
    echo "<span id='connectionDbStatusEr'>Database not selected</span></br>";
} else {
    print_r("<span id='connectionDbStatus'>" . "Hello: " . $fetchUser[0] . "</span>" . "<br>");
    print_r("<span id='connectionDbStatus'>" . "Current selected database: " . $fetchDatabase[0] . "</span>");
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Query requests
$queryBook = 'SELECT * FROM book';
$queryDVD = 'SELECT * FROM dvd';
$queryFurniture = 'SELECT * FROM furniture';
$currentUser = 'SELECT CURRENT_USER()';

//Query results
$resultBook = mysqli_query($DBconnect, $queryBook);
$resultDVD = mysqli_query($DBconnect, $queryDVD);
$resultFurniture = mysqli_query($DBconnect, $queryFurniture);
//Checking if $result holds any data
$resultCheckBook = mysqli_num_rows($resultBook);
$resultCheckDVD = mysqli_num_rows($resultDVD);
$resultCheckFurniture = mysqli_num_rows($resultFurniture);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo ("<section class='productSection'>");
if (mysqli_num_rows($resultBook) > 0) {

    while ($rowsBook = mysqli_fetch_assoc($resultBook)) {


        print_r(" <div>  <input type='checkbox' value=" . "'" . $rowsBook['id'] . "'" . "name='selectedCheck[]'>" . "
        <h4>Book Database id => " . $rowsBook['id'] . "<br>" . "SKU: " . $rowsBook['sku'] . "<br>" . "Name: " . $rowsBook['name'] . "<br>" . "Price: " . $rowsBook['price'] . "<br>" . "Weight: " . $rowsBook['weight'] . "</h4>
    </div>");
    }
}
if (mysqli_num_rows($resultDVD) > 0) {
    while ($rowDVD = mysqli_fetch_assoc($resultDVD)) {


        print_r("<div> <input type='checkbox' value=" . "'" . $rowDVD['id'] . "'" . "name='selectedCheck[]'>" . "
        <h4>" . "DVD Database id => " . $rowDVD['id'] . "<br>" . "SKU: " . $rowDVD['sku'] . "<br>" . "Name: " . $rowDVD['name'] . "<br>" . "Price: " . $rowDVD['price'] . "<br>" . "Weight: " . $rowDVD['size'] . "</h4>
    </div>");
    }
}
if (mysqli_num_rows($resultFurniture) > 0) {
    while ($rowFurniture = mysqli_fetch_assoc($resultFurniture)) {

        print_r("<div> <input type='checkbox' value=" . "'" .  $rowFurniture['id'] . "'" . "name='selectedCheck[]'>" . "
        <h4>" . "Furniture Database id => " . $rowFurniture['id'] . "<br>" . "SKU: " . $rowFurniture['sku'] . "<br>" . "Name: " . $rowFurniture['name'] . "<br>" . "Price: " . $rowFurniture['price'] . "<br>" . "Height: " . $rowFurniture['height'] . "<br>" . "Width: " . $rowFurniture['width'] . "<br>" . "Length: " . $rowFurniture['length'] . "</h4>
    </div>");
    }
}
echo (" </section>");
if ($resultCheckBook < 1) {
    echo "<div id='connectionDbStatusEr'>Book Table holds no record</div></br>";
}
if ($resultCheckDVD < 1) {
    echo "<div id='connectionDbStatusEr'>DVD Table holds no record</div></br>";
}
if ($resultCheckFurniture < 1) {
    echo "<div id='connectionDbStatusEr'>Furniture Table holds no record</div></br>";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
