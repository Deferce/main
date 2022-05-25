<?php
//credentials for connection
$servername = "localhost";
$username = "root";
$password = "mysql";
////////////////////////////////////////////////////////////////////////////////////////////
//db connection



$DBconnect = mysqli_connect($servername, $username, $password);
//checking connection
if ($DBconnect == true) {
    echo "<span id='connectionDbStatus'>Connection established</span>";
}
//if connection is false
if (!$DBconnect) {
    die("<span id='connectionDbStatusEr'>Connection not established</span></br>" . mysqli_connect_error());
}
