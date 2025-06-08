<?php
$host = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'usersg2_db';

$conn = mysqli_connect($host, $dbUser, $dbPassword, $dbName);

if (!$conn){
   die("Connection failed" . mysqli_connect_error());
}


?>