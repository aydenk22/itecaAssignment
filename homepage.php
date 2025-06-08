

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="hompage.css">
</head>
<body>

   <section class="header">
      <a href="" class="logo">Logo</a>
      <div>
         <ul class="navBar">
            <li><a href="homepage.html">Home</a></li>
            <li><a href="cart.html"><i class="bi bi-bag"></i></a></li>
         </ul>
      </div>
   </section>
   
   <section class="midSection">
      <div class="categoryBar">
         <ul class="categoryList">
            <li>Cat 1</li>
            <li>Cat 2</li>
            <li>Cat 3</li>
            <li>Cat 4</li>
            <li>Cat 5</li>
         </ul>
      </div>
      
      <div class="featuredProducts">
         <div class="productsTitle" >
         <h2>Featured Products</h2>
         </div>
       <div class="products" id="products">
         <?php
         include('featured.php');
         ?>
       </div>
      </div>
       </div>
      </div>
   </section>
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
   <script src="homepage.js"></script>

</body>
</html>
