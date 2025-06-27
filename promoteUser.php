<?php

$userID = $_GET['id'];
include('userdb.php');
session_start();

$query = "UPDATE users SET isAdmin=1 WHERE id='$userID'";
mysqli_query($conn, $query);
header("Location: users.php");
exit();

