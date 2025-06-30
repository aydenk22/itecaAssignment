<?php

include('userdb.php');
session_start();

$userCount = 0;
$orderCount = 0;
$productCount = 0;
$revenue = 0;

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$userRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($userRows as $row) {
    $userCount++;
}

$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
$orderRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($orderRows as $row) {
    $orderCount++;
}

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
         <li><i class="bi bi-table"></i><a href="users.php">Users</a></li>
         <li><i class="bi bi-bar-chart-fill"></i><a href="#">Products</a></li>
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

      <h3 class="iName">Dashboard</h3>

      <div class="values">
         <div class="valueBox">
            <i class="bi bi-people-fill"></i>
            <div>
               <h3><?php echo $userCount ?></h3>
               <span>Users</span>
            </div>
         </div>
         <div class="valueBox">
            <i class="bi bi-cart2"></i>
            <div>
               <h3><?php echo $orderCount ?></h3>
               <span>Orders</span>
            </div>
         </div>
         <div class="valueBox">
            <i class="bi-card-list"></i>
            <div>
               <h3>215,542</h3>
               <span>Products Sold</span>
            </div>
         </div>
         <div class="valueBox">
            <i class="bi bi-piggy-bank"></i>
            <div>
               <h3>R677.89</h3>
               <span>Revenue</span>
            </div>
         </div>
      </div>

      <div class="board">
         <table width="100%">
            <thead>
               <tr>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Number</td>
               </tr>
            </thead>
            <tbody>

               <?php
                  foreach ($userRows as $row) {
                     if ($row['isAdmin'] == 0) {
                        continue; // Skip admin users
                     }

                     echo "<tr>";
                     echo "<td class='name'>" . htmlspecialchars($row['name']) . "</td>";
                     echo "<td class='email'>" . htmlspecialchars($row['email']) . "</td>";
                     echo "<td class='phone'>" . htmlspecialchars($row['phoneNumber']) . "</td>";
                     echo "<td class='delete'><a href='deleteUser.php?id=" . htmlspecialchars($row['id']) . "'>DELETE</a></td>";
                     echo "<td class='demote'><a href='demoteUser.php?id=" . htmlspecialchars($row['id']) . "'>DEMOTE</a></td>";
                     echo "</tr>";

                  }

               ?>
            </tbody>
         </table>
      </div>
   </section>

   <script>
      $('#menuButton').click(function(){
         $('#menu').toggleClass('active');
      })
   </script>

</body>
</html>