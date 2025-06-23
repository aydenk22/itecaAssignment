<?php
session_start();
include('userdb.php');
$userID = $_SESSION['userID'];
$query = "SELECT cartID FROM users WHERE id = $userID";
$result = mysqli_query($conn, $query);
$cart = mysqli_fetch_assoc($result);
$cartID = $cart['cartID'];

$query = "SELECT * FROM cart WHERE id = '$cartID'";
$result = mysqli_query($conn, $query);
$cartDetails = mysqli_fetch_assoc($result);
$cartItems = json_decode($cartDetails['cartItems'], true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <section class="header">
      <a href="homepage.php" class="logo">Shop-A-Lot</a>
      <div>
         <ul class="navBar">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="add.php">Sell a product?</a></li>
            <li><a href="account.php"><i class="bi bi-person"></i></a></li>
            <li><a href="cart.php"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>

   <section id="cart" class="sectionP1">
      <table width="100%">
         <thead>
            <tr>
               <td>Remove</td>
               <td>Image</td>
               <td>Product</td>
               <td>Price</td>
               <td>Quantity</td>
               <td>Subtotal</td>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td><a href=""><i class="bi bi-trash"></i></a></td>
               <td><img src="img/6843efd73d06d2.35309125.jpg" alt=""></td>
               <td>Shoes</td>
               <td>R2900,00</td>
               <td><input type="number" value="1" min="1" max="10"></td>
               <td>R2999,00</td>
            </tr>
         </tbody>
      </table>
   </section>

</body>
</html>