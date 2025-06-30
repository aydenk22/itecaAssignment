<?php
session_start();
include('userdb.php');

$productID = $_GET['PID'];
$cartID = $_SESSION['cartID'];

$query = "SELECT * FROM products WHERE id = '$productID'";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
$images = json_decode($product['images'], true);

$query = "SELECT * FROM cart WHERE id = '$cartID'";
$result = mysqli_query($conn, $query);
$cart = mysqli_fetch_assoc($result);
$cartItems = json_decode($cart['cartItems'], true);

$query = "SELECT * FROM item_bundle WHERE itemID = '$productID' AND cartID = '$cartID'";
$result = mysqli_query($conn, $query);
$bundle = mysqli_fetch_assoc($result);

$deleteValue = $productID;
if (($key = array_search($deleteValue, $cartItems)) !== false){
   unset($cartItems[$key]);
}

$cartTotal = $cart['total'] - $bundle['bundlePrice'];

$query = "UPDATE cart SET total = '$cartTotal' WHERE id = '$cartID'";
mysqli_query($conn, $query);

$query = "DELETE FROM item_bundle WHERE itemID = '$productID' AND cartID = '$cartID'";
mysqli_query($conn, $query);

$cartItems = json_encode($cartItems, true);

$query = "UPDATE cart SET cartItems = '$cartItems' WHERE id = '$cartID'";
mysqli_query($conn, $query);

header('Location: cart.php');


