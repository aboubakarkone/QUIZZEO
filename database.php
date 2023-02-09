<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "testprojet2";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong to connect ;");
}

?>
