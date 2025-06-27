<?php

include('userdb.php');

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$userRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($userRows as $row){
    echo "<p>User ID: " . $row['id'] . "</p>";
    echo "<p>Name: " . $row['name'] . "</p>";
    echo "<p>Surname: " . $row['surname'] . "</p>";
    echo "<p>Email: " . $row['email'] . "</p>";
    echo "<p>Phone Number: " . $row['phoneNumber'] . "</p>";
    echo "<hr>";
}