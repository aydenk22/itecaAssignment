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
      <label for="name">Name: </label>
      <input type="text" name="name"><br>
      <label for="description">Description: </label>
      <input type="text" name="description"><br>
      <label for="price">Price: </label>
      <input type="number" name="price" min="0.00" step="0.01"><br>
      <label for="category">Category: </label>
      <select name="category" id="category">
         <option value="1">Clothing & Shoes</option>
         <option value="2">Tools</option>
         <option value="3">Electronics</option>
         <option value="4">Books</option>
         <option value="5">Services</option>
      </select> <br>
      Images: <input type="file" name="images[]" id="images" multiple><br>
      <input type="submit" value="Submit">
   </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
   $images = $_FILES['images'];
   $imagesName = $images['name'];
   $newImages = array();

   for ($i = 0; $i < count($imagesName); $i++) {
      $fileTmpName = $images['tmp_name'][$i];
      $fileSize = $images['size'][$i];
      $fileError = $images['error'][$i];
      $fileType = $images['type'][$i];

      $fileExt = explode('.', $images['name'][$i]);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)){
         if ($fileError === 0){
            if ($fileSize < 1000000){
               $fileNameNew = uniqid('', true).".".$fileActualExt;
               $fileDestination = 'img/'.$fileNameNew;
               array_push($newImages, $fileDestination);
               move_uploaded_file($fileTmpName, $fileDestination);
               header("Location: homepage.php");
            } else{
               echo "File size is too big";
               exit();
            }
         } else{
            echo "There was an error uploading your file!";
            exit();
         }
      } else {
         echo "Can only upload jpg, jpeg, or png files!";
         exit();
      }
  
}


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$price = $_POST['price'];
$newImages = json_encode($newImages);
$category = $_POST['category'];
$category = (int) $category;
$sql = "INSERT INTO products (name, description, price, category_id, images) VALUES ('$name', '$description', '$price', '$category', '$newImages')";
mysqli_query($conn, $sql);
echo "Successfully added";

}

