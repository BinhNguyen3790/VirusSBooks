<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 29/01/2019
 * Time: 1:41 PM
 */
  session_start();
  // check to see user is logged in. If not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
  // check if user submited the add category form
  if (isset($_POST['submit'])) {
    // set addcategory session
    $_SESSION['addcategory']['name'] = $_POST['name'];
    $_SESSION['addcategory']['topline'] = $_POST['topline'];  
    $_SESSION['addcategory']['date'] = $_POST['date'];
    $_SESSION['addcategory']['description'] = $_POST['description'];
  }else{
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <div class="text-center">
      <?php if ($_FILES['fileToUpload']['name'] != "") {
        $_SESSION['addcategory']['photo']  = $_FILES['fileToUpload']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if ($check !== false) {
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, image already exists. ";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your image was not uploaded.<span class='text-danger'>You still want to add</span>";
          $_SESSION['addcategory']['photo'] = "image.jpg";
          // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
            <h1 class="pb-2">Confirm Category</h1>
            <p>Name: <?php echo $_SESSION['addcategory']['name']?></p>
            <p>Toline: <?php echo $_SESSION['addcategory']['topline']?></p>
            <p>Photo: <?php echo $_SESSION['addcategory']['photo']?></p>
            <img src="images/<?php echo $_SESSION['addcategory']['photo']?>" alt="" width="200" class="pb-3 img-fluid">
            <p class="">Date: <?php echo $_SESSION['addcategory']['date']?></p>
            <p>Description: <?php echo $_SESSION['addcategory']['description']?></p>
          <?php } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
      // the code below only runs if no image is selected
      else{
        $_SESSION['addcategory']['photo'] = "image.jpg";
        ?>
        <h1 class="pb-2">Confirm Category</h1>
        <p>Name: <?php echo $_SESSION['addcategory']['name']?></p>
        <p>Toline: <?php echo $_SESSION['addcategory']['topline']?></p>
        <p>Photo: <?php echo $_SESSION['addcategory']['photo']?></p>
        <img src="images/<?php echo $_SESSION['addcategory']['photo']?>" alt="" width="200" class="pb-3 img-fluid">
        <p class="">Date: <?php echo $_SESSION['addcategory']['date']?></p>
        <p>Description: <?php echo $_SESSION['addcategory']['description']?></p>
      <?php }
      ?>
        <p>
          <a class="btn btn-danger" href="index.php?page=addcategory">Oops, go back</a>
          <a class="btn btn-success" href="index.php?page=entercategory">Correct, continue</a>
        </p>
    </div>
    <hr class="featurette-divider">
  </div>
</div>