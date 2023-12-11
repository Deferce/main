<html>

<head>

    <meta http-equiv="refresh" content="3; url = http://projectss.totalh.net/projects/ERP%20Admin%20Panel/main.php  " />
    <link rel="stylesheet" href="./css/main.css">
</head>



</html>
<?php


require './connect.php';
//selecting  db
$selectDB = mysqli_select_db($DBconnect, "if0_35502129_products");


//using for each loop to cycle through id's returned by form and delete them through query
foreach ($_POST['selectedCheck'] as  $selected) {
    echo "<br id='connectionDbStatus'> You have deleted current fields:" . $selected . "<br>";
    echo $_POST['selectedCheck'];
    $deleteQueryBOOK = 'DELETE  FROM book  WHERE id =' . $selected;
    $deleteQueryDVD = 'DELETE  FROM dvd  WHERE id =' . $selected;
    $deleteQueryFURNITURE = 'DELETE  FROM furniture  WHERE id =' . $selected;

    mysqli_query($DBconnect,   $deleteQueryBOOK);
    mysqli_query($DBconnect,   $deleteQueryFURNITURE);
    mysqli_query($DBconnect,   $deleteQueryDVD);
}
