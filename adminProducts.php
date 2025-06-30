<?php

include('userdb.php');
session_start();

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$userRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$productRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="adminStyles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
   <section id="menu">
      <div class="logo">
         <h2>Shop-A-Lot</h2>
      </div>

      <div class="items">
         <li><i class="bi-speedometer2"></i><a href="adminPanel.php">Dashboard</a></li>
         <li><i class="bi bi-table"></i><a href="adminUsers.php">Users</a></li>
         <li><i class="bi bi-bar-chart-fill"></i><a href="adminProducts.php">Products</a></li>
         <li><i class="bi-box-arrow-right"></i><a href="logout.php">Logout</a></li>
      </div>
      
   </section>

   <section id="interface">
      <div class="navBar">

         <div class="n1">
            <div>
               <i id="menuButton" class="bi bi-list"></i>
            </div>
         </div>
         <div class="profile">
            <a href="#"><i class="bi bi-person-circle"></i></a>
         </div>
      </div>

      <h3 class="iName">Products</h3>

      <div class="values">
         
      </div>

      <div class="users">
         <table width="100%">
            <thead>
               <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Description</td>
                  <td>Price</td>
               </tr>
            </thead>
            <tbody>

               <?php
               if ($productRows) {
                  foreach ($productRows as $row) {

                     echo "<tr>";
                     echo "<td class='id'>" . htmlspecialchars($row['id']) . "</td>";
                     echo "<td class='name'>" . htmlspecialchars($row['name']) . "</td>";
                     echo "<td class='email'>" . htmlspecialchars($row['description']) . "</td>";
                     echo "<td class='phone'>" . htmlspecialchars($row['price']) . "</td>";
                     echo "<td class='promote'><a href='editProduct.php?id=" . htmlspecialchars($row['id']) . "'>EDIT</a></td>";
                     echo "</tr>";
                  }
               } else {
                  echo "<tr><td colspan='5'>No users found.</td></tr>";
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>

   <script>
   </script>

</body>
</html>