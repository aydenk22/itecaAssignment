<?php

include('userdb.php');
session_start();

$userID = $_GET['id'];

echo $userID;