<?php
session_start();
include('userdb.php');

$productID = $_GET['PID'];
$query = "SELECT * FROM products WHERE id = " . $productID;
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$images = json_decode($row['images'], true);

$query = "SELECT * FROM categories WHERE id = " . $row['category_id'];
$result = mysqli_query($conn, $query);
$categoryRow = mysqli_fetch_assoc($result);
$category = $categoryRow['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <section class="header">
      <a href="homepage.php" class="logo">Logo</a>
      <div>
         <ul class="navBar">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="add.php">Sell a product?</a></li>
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
         <h2>R<?php echo($row['price']) ?></h2>
         <label for="quantity">Quantiy: </label>
         <input type="number" value="1" min="1" max="10" class="quantity" name="quantity" id="quantity">
         <button><i class="bi bi-cart2"></i>Add to Cart</button>
         <h4>Product Details</h4>
         <span><?php echo($row['description']) ?></span>
      </div>
      
   </section> <br><br>
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

         var addToCartButton = document.getElementById("addToCartButton");

         addToCartButton.onclick = function() {

            alert("Item added to cart");

            var productID = <?php $productID; ?>;
            var quantity = document.getElementById("quantity").value;

            <?php 

            $id = 16; // Replace with the actual user ID from session or database

            $query = "SELECT * FROM user WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            if ($user['cartID'] == null || $user['cartID'] == ''){
               $cart = uniqid();

               $query = "UPDATE users SET cartID = '$cart' WHERE id = '$id'";
               mysqli_query($conn, $query);
               $query = "INSERT INTO cart (id, userid) VALUES ('$cart', '$id')";
               mysqli_query($conn, $query);

               echo "Item added to cart";
               }
            else {
               echo "Item not added";
            }

            ?>
            
         }
         
      </script>

      <script src="script.js"></script>
</body>
</html>

<?php
// if (isset($_POST['addToCartButton'])) {
    
//     $id = $_SESSION['userID'];

//     $query = "SELECT * FROM user WHERE id = '$id'";
//     $result = mysqli_query($conn, $query);
//     $user = mysqli_fetch_assoc($result);

//     if ($user['cartID'] == null || $user['cartID'] == ''){
//       $cart = uniqid();

//       $query = "INSERT INTO users (cartID) WHERE id = '$id'";
//       mysqli_query($conn, $query);
//       $query = "INSERT INTO cart (id, userid) VALUES ('$cart', '$id')";
//       mysqli_query($conn, $query);

//       echo "Item added to cart";
//     }
//    }

