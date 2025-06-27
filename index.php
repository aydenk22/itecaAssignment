<?php
session_start();
include('userdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop-A-Lot - SignUp</title>
   <link rel="stylesheet" href="index.css">
</head>
<body>
   <div class="formContainer">
      <form action="index.php" method="post" class="loginForm">
      <h1>Login</h1>
      <!-- Email: <br> -->
      <input type="email" name="email" placeholder="Email" class="textBox"> <br>
      <!-- Password: <br> -->
      <input type="password" name="password" placeholder="Password" class="textBox"><br>
      <input type="submit" class="loginButton" value="Login">
      <!-- <button type="submit" class="loginButton">Login</button> -->
      <a href="signup.php">Sign-up</a><br>
      </form>
   </div>
      
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
   $email = $_POST['email'];
   $password = trim($_POST['password']);

   if (empty($email)){
      echo "Please enter your email address";
   }
   elseif (empty($password)){
      echo "Please enter you password";
   }
   else{
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $data =mysqli_query($conn, $sql);
      $user = mysqli_fetch_assoc($data);

      if (password_verify($password, $user["password"])){
         $_SESSION['email'] = $email;
         $_SESSION['userID'] = $user['id'];

         $query = "SELECT isAdmin FROM users WHERE email = '$email'";
         $result = mysqli_query($conn, $query);
         $row = mysqli_fetch_assoc($result);

         if ($row['isAdmin'] != 0){
            $_SESSION['isAdmin'] = true;
         } else {
            $_SESSION['isAdmin'] = false;
         }

         header("Location: homepage.php");
      } else{
         echo "Error: Incorrect password";
      }
      
   }
   
}


mysqli_close($conn);
?>
