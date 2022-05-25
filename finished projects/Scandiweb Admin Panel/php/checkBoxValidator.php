<html>

<head>

    <meta http-equiv="refresh" content="5; url = http://localhost/web/JunTest%20scandiweb/main.php" />
    <link rel="stylesheet" href="./css/main.css">
</head>



</html>
<?php
require './connect.php';
//selecting  db
$selectDB = mysqli_select_db($DBconnect, "products");

//using for each loop to cycle through id's returned by form and delete them through query
foreach ($_POST['selectedCheck'] as  $selected) {
    echo "<br id='connectionDbStatus'> You have deleted current fields:" . $selected . "<br>";

    $deleteQueryBOOK = 'DELETE  FROM book  WHERE id =' . $selected;
    $deleteQueryDVD = 'DELETE  FROM dvd  WHERE id =' . $selected;
    $deleteQueryFURNITURE = 'DELETE  FROM furniture  WHERE id =' . $selected;

    mysqli_query($DBconnect,   $deleteQueryBOOK);
    mysqli_query($DBconnect,   $deleteQueryFURNITURE);
    mysqli_query($DBconnect,   $deleteQueryDVD);
}
