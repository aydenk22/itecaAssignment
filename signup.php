<?php
include('userdb.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="signup.php" method="post"><br>
      Name: <input type="text" name="name"><br>
      Surname: <input type="text" name="surname"><br>
      Email: <input type="email" name="email"><br>
      Number: <input type="tel" name="phoneNumber"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Sign-Up">
   </form>
   Already have an account?
   <a href="login.php">Login</a>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){

   $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
   $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
   $email = $_POST['email'];
   $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_SPECIAL_CHARS);
   $password = trim($_POST['password']);

   if (empty($name) || empty($surname) || empty($email) || empty($phoneNumber) || empty($password)){
      echo "Please enter all the fields above";
   }
   else{

      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (name, surname, email, phoneNumber, password) VALUES ('$name', '$surname', '$email', '$phoneNumber', '$hash')";
      mysqli_query($conn, $sql);
      
      echo "You are now a registered user";


   }
}

?>