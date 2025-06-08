<?php

include('userdb.php');


$sql = 'SELECT * FROM products ORDER BY RAND() LIMIT 3';
$result = mysqli_query($conn, $sql);

$ids = [];

foreach($result as $row){
   // echo('<a href="productPage.html">');
   echo('<div class="productContainer" id="p1Container">');
   echo('<img id="p1Img" src="'.$row["thumbnail"].'" alt="">');
   echo('<div class="description">');
   echo('<h5 id="p1Name">'.$row['name'].'</h5>');
   echo('<h4 id="p1Price">R'.$row['price'].'</h4>');
   echo('</div>');
   echo('<button class="addToCartButton"><i class="bi bi-cart2"></i></button>');
   echo('</div>');
   // echo('</a>');
}
