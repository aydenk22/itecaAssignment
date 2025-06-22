<?php
session_start();
include('userdb.php');
include('login.html');

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

         header("Location: homepage.php");
      } else{
         echo "Error: Incorrect password";
      }
      
   }
   
}


mysqli_close($conn);
?>
