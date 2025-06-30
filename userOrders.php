<?php
session_start();
include('userdb.php');

$userID = $_SESSION['userID'];
$query = "SELECT * FROM orders WHERE userID = '$userID'";
$result = mysqli_query($conn, $query);
$orders = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="homepage.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>

   <section class="header">
      <a href="homepage.php" class="logo">Shop-A-Lot</a>
      <div>
         <ul class="navBar">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="add.php">Sell a product?</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="account.php"><i class="bi bi-person"></i></a></li>
            <li><a href="cart.php"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>
   
   <section id="accountSection">
      <div class="categoryBar">
         <ul class="categoryList">
            <li><a href="account.php">Account Details</a></li>
            <li><a href="userOrders.php">Orders</a></li>
            <li><a href="cart.php">Cart</a></li>
         </ul>
      </div>
      
      <div class="userOrders">
         <div class="productsTitle" >
         <h2>Orders</h2>
         </div>
         <div id="orderContainer" width="100%">
            <div>
               <h3>Status: Completed</h3>
               <h4>Total: R23 098</h4>
            </div>
            <div class="images">
               <img src="img/6843efd73d06d2.35309125.jpg" alt="">
               <img src="img/6843efd73d06d2.35309125.jpg" alt="">
            </div>
         </div>
       <div class="products" id="products">
         <?php

         // $query = "SELECT * FROM users WHERE id = '$userID'";
         // $result = mysqli_query($conn, $query);

         // if (mysqli_num_rows($result) > 0) {
         //    $user = mysqli_fetch_assoc($result);
         //    echo '<div class="productContainer" id="p1Container">';
         //    echo '<h3>Username: ' . htmlspecialchars($user['name']) . '</h3>';
         //    echo '<h3>Email: ' . htmlspecialchars($user['email']) . '</h3>';
         //    echo '<h3>Phone: ' . htmlspecialchars($user['phoneNumber']) . '</h3>';
         //    echo '</div>';
         // } else {
         //    echo '<p>No user found.</p>';
         // }

         ?>
       </div>
      </div>
       </div>
      </div>
   </section>
   
   <footer class="footer">

   </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
   <script src="homepage.js"></script>

</body>
</html>
