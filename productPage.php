<?php

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
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <section class="header">
      <a href="homepage.php" class="logo">Logo</a>
      <div>
         <ul class="navBar">
            <li><a href="add.php">Sell a product?</a></li>
            <li><a href="homepage.php">Home</a></li>
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
         <button>Add to Cart</button>
         <h4>Product Details</h4>
         <span><?php echo($row['description']) ?></span>
      </div>
      
   </section>

</body>
</html>
