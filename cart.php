<?php
session_start();
include('userdb.php');
$userID = $_SESSION['userID'];
$query = "SELECT cartID FROM users WHERE id = $userID";
$result = mysqli_query($conn, $query);
$cart = mysqli_fetch_assoc($result);
$cartID = $cart['cartID'];
$_SESSION['cartID'] = $cartID;

$query = "SELECT * FROM cart WHERE id = '$cartID'";
$result = mysqli_query($conn, $query);
$cartDetails = mysqli_fetch_assoc($result);

if ($cartDetails['total'] == null){
   $total = 0;
}
else{
   $total = $cartDetails['total'];
}


if ($cartDetails['cartItems'] == null){
   $cartItems = null;
} else{
   $cartItems = json_decode($cartDetails['cartItems'], true);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop-A-Lot - Cart</title>
   <link rel="stylesheet" href="cart.css">
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

   <section id="cart">
      <h2>Cart</h2>
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
            <?php
            if ($cartItems == null || $cartItems == ''){
               echo '<tr> <h2> Cart is empty </h2> </tr>';
            }
            else{ 
            foreach($cartItems as $cartItemID){
               $query = "SELECT * FROM products WHERE id = '$cartItemID'";
               mysqli_query($conn, $query);
               $result = mysqli_query($conn, $query);
               $item = mysqli_fetch_assoc($result);
               $itemImgs = json_decode($item['images']);

               $query = "SELECT * FROM item_bundle WHERE cartID = '$cartID' AND itemID = '$item[id]'";
               $result = mysqli_query($conn, $query);
               $itemBundle = mysqli_fetch_assoc($result);
               
               echo('<tr>
               <td><a href="cartRemove.php?PID='.$item['id'].'"><i class="bi bi-trash"></i></a></td>
               <td><img src="'.$itemImgs[0].'" alt=""></td>
               <td>'.$item['name'].'</td>
               <td>R'.$item['price'].'</td>
               <td><input type="number" value="'.$itemBundle['quantity'].'" min="1" max="10"></td>
               <td>R'.$itemBundle['bundlePrice'].'</td>
               </tr>');
               
            }
         }
            ?>
         </tbody>
      </table>
   </section>

   <section id="cartAdd">
      <div id="subTotal">
         <h3>Cart Total</h3>
         <table>
            <tr>
               <td>Cart Subtotal</td>
               <td>R <?php echo $total ?></td>
            </tr>
            <tr>
               <td><strong>Total</strong></td>
               <td><strong>R <?php echo $total ?></strong></td>
            </tr>
         </table>
         <form method="post"><input type="submit" value="Checkout" class="checkoutButton"></form>
      </div>
   </section>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
   header('Location: checkout.php');
}

?>