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
   <title>Shop-A-Lot - Checkout</title>
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
            <li><a href="shop.php">Shop</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="account.php"><i class="bi bi-person"></i></a></li>
            <li><a href="cart.php"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>

   <form method='post' enctype="multipart/form-data">
      <label for="cardType">Card Type: </label>
      <select name="cardType" id="cardType">
         <option value="1">Debit Card</option>
         <option value="2">Credit Card</option>
      </select><br>

      <label for="name">Cardholder Name: </label>
      <input type="text" name="name"><br>

      <label for="cardNumber">Card Number: </label>
      <input type="number" name="cardNumber"><br>

      <label for="address">Address: </label>
      <input type="text" name="address"><br>

      <input type="submit" value="Pay" name="payButton">
   </form>
</body>
</html>

<?php
if (isset($_POST['payButton'])) {
   
   $query = "SELECT * FROM users WHERE id = '$userID'";
   $result = mysqli_query($conn, $query);
   $user = mysqli_fetch_assoc($result);
   $cartID = $user['cartID'];

   $query = "SELECT * FROM cart WHERE id = '$cartID'";
   $result = mysqli_query($conn, $query);
   $cart = mysqli_fetch_assoc($result);
   $cartItems = json_decode($cart['cartItems'], true);

   $query = "INSERT INTO orders (userID, orderStatus, items, total) VALUES ('$userID', 'Completed', '$cart[cartItems]', '$cart[total]')";
   mysqli_query($conn, $query);

   $newCartItems = array();
   $newCartItems = json_encode($newCartItems, true);

   $query = "UPDATE cart SET cartItems = '$newCartItems', total = 0 WHERE id = '$cartID'";
   mysqli_query($conn, $query);

   $query = "DELETE FROM item_bundle WHERE cartID = '$cartID'";
   mysqli_query($conn, $query);
   
   
   echo "<script>alert('Payment Successful');</script>";
   header('Location: homepage.php');
   
}
