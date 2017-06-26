<?php

/*$servername = "localhost";
$username = "aus3950_root";
$password = "pukuotukas11";
$dbname = "aus3950_contacts";*/


$servername = "localhost";
$username = "root";
$password = "majestic012";
$dbname = "rekvizitai";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
mysqli_set_charset($conn,"utf8");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>