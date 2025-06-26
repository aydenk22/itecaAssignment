<?php
session_start();
include('userdb.php');
$userID = $_SESSION['userID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop-A-Lot - Account</title>
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
            <li><a href="logout.php">Logout</a></li>
            <li><a href="account.php"><i class="bi bi-person"></i></a></li>
            <li><a href="cart.php"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>

   <section id="accountSection" width="100%">
   <h2>Account</h2>
   <div class="account">
      <div>
      <h4>Account details</h4>
   </div>
   <div>
      <h4>Orders</h4>
   </div>
   <div>
      <h4>Cart</h4>
   </div>
   <div>
      <button>Logout</button>
   </div>
   </div>
   </section>

</body>
</html>