<?php

// credentials for connection
$servername = "sql313.infinityfree.com";
$username = "if0_35502129";
$password = "E8lduVERJjc05q4";
$dbName = 'if0_35502129_products';

// db connection
$DBconnect = mysqli_connect($servername, $username, $password);

// checking connection
if ($DBconnect) {
    echo "<span id='connectionDbStatus'>Connection established</span>";

    // select the specific database
    $selectDbResult = mysqli_select_db($DBconnect, $dbName);

    if (!$selectDbResult) {
        die("<span id='connectionDbStatusEr'>Failed to select database</span></br>" . mysqli_error($DBconnect));
    }

    // query to get the current database
    $getCurrentDbQuery = "SELECT DATABASE() AS currentDatabase";
    $result = mysqli_query($DBconnect, $getCurrentDbQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentDatabase = $row['currentDatabase'];
    } else {
        echo "<span id='connectionDbStatusEr'>Failed to get current database</span></br>" . mysqli_error($DBconnect);
    }
} else {
    die("<span id='connectionDbStatusEr'>Connection not established</span></br>" . mysqli_connect_error());
}
