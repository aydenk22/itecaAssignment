<?php
session_start();
include('userdb.php');

$itemID = $_GET['PID'];
$query = "SELECT * FROM products WHERE id = " . $itemID;
$result = mysqli_query($conn, $query);
$item = mysqli_fetch_assoc($result);
$price = $item['price'];

$images = json_decode($item['images'], true);

$query = "SELECT * FROM categories WHERE id = " . $item['category_id'];
$result = mysqli_query($conn, $query);
$categoryRow = mysqli_fetch_assoc($result);
$category = $categoryRow['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop-A-Lot - Products</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="style.css">
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
   
   <section id="productDetails" class="sectionP1">
      <div class="singleImg">
         <?php echo('<img src="'.$images[0].'" width="100%" id="mainImg" alt="">');?>

         <div class="smallImgGroup">
            <div class="smallImgCol">
               <?php echo('<img id="mainImg" src="'.$images[0].'" width="100%" alt="" class="smallImg">')?>
            </div>
            <div class="smallImgCol">
               <?php echo('<img id="mainImg" src="'.$images[1].'" width="100%" alt="" class="smallImg">')?>
            </div>
            <div class="smallImgCol">
               <?php echo('<img id="mainImg" src="'.$images[2].'" width="100%" alt="" class="smallImg">')?>
            </div>
            <div class="smallImgCol">
               <?php echo('<img id="mainImg" src="'.$images[3].'" width="100%" alt="" class="smallImg">')?>
            </div>
         </div>

      </div>

      <div class="singleProductDetails">
         <h4><?php echo($category) ?></h4>
         <h2>R<?php echo($item['price']) ?></h2>
         <label for="quantity">Quantity: </label>
         <form method="post">
            <input type="number" value="1" min="1" max="10" class="quantity" name="quantity" id="quantity">
            <input type="submit" value="Add to Cart" class="addToCartButton" name="addToCartButton" id="addToCartButton">
          </form>
         
         <h4>Product Details</h4>
         <span><?php echo($item['description']) ?></span>
      </div>
      
   </section> <br><br>

   <?php

   if (isset($_POST['addToCartButton'])){

         // $quantity = '<script>document.getElementById("quantity").value</script>';
         // $quantity = intval($quantity);

         $quantity = $_POST['quantity'];
         $itemID = $_GET['PID'];
         $itemID = intval($itemID);

         $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
         $result = mysqli_query($conn, $query);
         $user = mysqli_fetch_assoc($result);
         $userID = $user['id'];
         $userCart = $user['cartID'];

         if ($userCart == null || $userCart == ''){
            $cart = uniqid('CART_', true);
            $query = "UPDATE users SET cartID = '$cart' WHERE id = $userID";
            mysqli_query($conn, $query);

            $cartItems = array();
            array_push($cartItems, $itemID);
            $cartItems = json_encode($cartItems);

            $query = "INSERT INTO cart (id, userID, cartItems) VALUES ('$cart', '$userID', '$cartItems')";
            mysqli_query($conn, $query);

            $itemBundlePrice = $price * $quantity;
            $query = "INSERT INTO item_bundle (cartID, itemID, quantity, bundlePrice) VALUES ('$cart', '$itemID', '$quantity', '$itemBundlePrice')";
            mysqli_query($conn, $query);
            echo "<script>alert('Item added to cart');</script>";
         }
         else if ($userCart != null || $userCart != ''){

            $query = "SELECT * FROM cart WHERE userID = $userID";
            $result = mysqli_query($conn, $query);
            $cart = mysqli_fetch_assoc($result);
            $userCartID = $cart['id'];
            $cartItems = $cart['cartItems'];

            $cartItems = json_decode($cartItems ,true);

            $isFound = False;

            foreach ($cartItems as $i){
               if ($i == $itemID){
                  $isFound = True;
                  echo "<script>alert('Item already in cart');</script>";
                  // header("Location: productPage.php?PID=$itemID");
                  break;
               }
            }

            if ($isFound == False){
               $itemBundlePrice = $price * $quantity;
               array_push($cartItems, $itemID);
               $cartItems = json_encode($cartItems, true);
               $query = "UPDATE cart SET cartItems = '$cartItems' WHERE id = '$cart[id]'";
               mysqli_query($conn, $query);

               $query = "INSERT INTO item_bundle (cartID, itemID, quantity, bundlePrice) VALUES ('$userCartID', '$itemID', '$quantity', '$itemBundlePrice')";
               mysqli_query($conn, $query);

               $query = "UPDATE cart SET total = total + '$itemBundlePrice' WHERE id = '$userCartID'";
               mysqli_query($conn, $query);
               echo "<script>alert('Item added to cart');</script>";
            }

               
               
            }
            
           
            
      }
         

   ?>

   <div class="featuredProducts">
         <div class="productsTitle" >
         <h2 style="background-color: rgb(85,80,92); color: rgb(254, 252, 251); padding: 20px;">Featured Products</h2>
         </div>
       <div class="products" id="products">
         <?php

         $sql = 'SELECT * FROM products ORDER BY RAND() LIMIT 3';
         $result = mysqli_query($conn, $sql);

         foreach($result as $row){

            $images = json_decode($row['images'], true);
            
            echo('<div class="productContainer" id="p1Container">');
            echo('<a href=productPage.php?PID='.$row['id'].'>');
            echo('<img id="p1Img" src="'.$images[0].'" alt="">');
            echo('<div class="description">');
            echo('<h5 id="p1Name">'.$row['name'].'</h5>');
            echo('<h4 id="p1Price">R'.$row['price'].'</h4>');
            echo('</div>');
            echo('</a>');
            echo('<button class="addToCartButton" id="addToCartButton"><i class="bi bi-cart2" ></i></button>');
            echo('</div>');

         }
         ?>
       </div>
      </div>

      <script>
         var mainImg = document.getElementById("mainImg");
         var smallImg = document.getElementsByClassName("smallImg");

         smallImg[0].onclick = function(){
            mainImg.src = smallImg[0].src;
         }
         smallImg[1].onclick = function(){
            mainImg.src = smallImg[1].src;
         }
         smallImg[2].onclick = function(){
            mainImg.src = smallImg[2].src;
         }
         smallImg[3].onclick = function(){
            mainImg.src = smallImg[3].src;
         }
         
      </script>

      <script src="script.js"></script>

      <?php 

      
      ?>


   </body>
</html>

