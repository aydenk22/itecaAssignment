<?php
session_start();
include('userdb.php');
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
            <li><a href="account.php"><i class="bi bi-person"></i></a></li>
            <li><a href="cart.php"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>
   
   <section class="midSection">
      <div class="categoryBar">
         <ul class="categoryList">
            <li><a href="">Clothing & Shoes</a></li>
            <li><a href="">Tools</a></li>
            <li><a href="">Electronics</a></li>
            <li><a href="">Books</a></li>
            <li><a href="">Services</a></li>
         </ul>
      </div>
      
      <div class="featuredProducts">
         <div class="productsTitle" >
         <h2>Featured Products</h2>
         </div>
       <div class="products" id="products">
         <?php

         $sql = 'SELECT * FROM products ORDER BY RAND() LIMIT 6';
         $result = mysqli_query($conn, $sql);

         $ids = [];

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
            echo('<button class="addToCartButton"><i class="bi bi-cart2"></i></button>');
            echo('</div>');

         }
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
