<?php

include('userdb.php');

$productID = $_GET['PID'];
$query = "SELECT * FROM products WHERE id = " . $productID;
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

echo $row['name']
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="productPage.css">
</head>
<body>
   <h1>
      This is the product page
   </h1>
</body>
</html>