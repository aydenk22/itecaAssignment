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
   <form action="add.php" method='post' enctype="multipart/form-data"><br>
     Name: <input type="text" name="name"><br>
      Description: <input type="text" name="description"><br>
      Price: <input type="number" name="price" min="0.00" step="0.01"><br>
      Thumbnail: <input type="file" name="thumbnail" id='thumbnail'><br>
      <input type="submit" value="Submit">
   </form>
</body>
</html>

<?php


if($_SERVER["REQUEST_METHOD"] == 'POST'){
   $file = $_FILES['thumbnail'];
   $fileName = $_FILES['thumbnail']['name'];
   $fileTmpName = $_FILES['thumbnail']['tmp_name'];
   $fileSize = $_FILES['thumbnail']['size'];
   $fileError = $_FILES['thumbnail']['error'];
   $fileType = $_FILES['thumbnail']['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg', 'jpeg', 'png');

   if (in_array($fileActualExt, $allowed)){
      if ($fileError === 0){
         if ($fileSize < 1000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'img/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header("Location: homepage.php?uploadsuccess");
         }else {
            echo "Your file is too big";
         }
      } else {
         echo "There was an error uploading your file!";
      }
   } else {
      echo "You cannot upload files of this type!";
   }


   $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
   $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
   $price = $_POST['price'];
   $thumbnail = $fileDestination;

   $sql = "INSERT INTO products (name, description, price, thumbnail) VALUES ('$name', '$description', '$price', '$thumbnail')";
   mysqli_query($conn, $sql);
   echo("Successfully added");
   
}

