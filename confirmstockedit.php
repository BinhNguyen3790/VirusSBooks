<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 01/02/2019
 * Time: 11:02 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_POST['update'])){
    $_SESSION['stockedit']['name'] = $_POST['name'];
    $_SESSION['stockedit']['categoryID'] = $_POST['categoryID'];
    $_SESSION['stockedit']['price'] = $_POST['price'];
    $_SESSION['stockedit']['date'] = $_POST['date'];
    $_SESSION['stockedit']['topline'] = $_POST['topline'];
    $_SESSION['stockedit']['description'] = $_POST['description'];
  }else{
    header("Location:index.php");
  } ?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <?php if ($_FILES['fileToUpload']['name'] != "") {
      $_SESSION['stockedit']['bigphoto'] = $_FILES['fileToUpload']['name'];
      $_SESSION['stockedit']['thumbnail'] = $_FILES['fileToUpload']['name'];
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
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
          <h1>Confirm Category To Delete</h1>
          <p>Name: <?php echo $_SESSION['stockedit']['name'];?></p>
          <p>Category: <?php
            $ct_sql = "SELECT * FROM categories WHERE id=".$_SESSION['stockedit']['categoryID'];
            $ct_qry = mysqli_query($dbc, $ct_sql);
            $ct_rs = mysqli_fetch_assoc($ct_qry);
            echo $ct_rs['name'];?>
          </p>
          <p>Price: <?php echo $_SESSION['stockedit']['price'];?></p>
          <p>Topline: <?php echo $_SESSION['stockedit']['topline'];?></p>
          <p>Date: <?php echo $_SESSION['stockedit']['date'];?></p>
          <p>Photo: <?php echo $_SESSION['stockedit']['bigphoto'];?></p>
          <img class="img-fluid" src="images/<?php echo $_SESSION['stockedit']['bigphoto'];?>" alt="" width="200">
          <p>Description: <?php echo $_SESSION['stockedit']['description'];?></p>
        <?php } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
    // the code below only runs if no image is selected
    else{
      $_SESSION['stockedit']['bigphoto'] = "image.jpg";
      $_SESSION['stockedit']['thumbnail'] = "image.jpg";
      ?>
      <h1>Confirm Category To Delete</h1>
      <p>Name: <?php echo $_SESSION['stockedit']['name'];?></p>
      <p>Category: <?php
        $ct_sql = "SELECT * FROM categories WHERE id=".$_SESSION['stockedit']['categoryID'];
        $ct_qry = mysqli_query($dbc, $ct_sql);
        $ct_rs = mysqli_fetch_assoc($ct_qry);
        echo $ct_rs['name'];?>
      </p>
      <p>Price: <?php echo $_SESSION['stockedit']['price'];?></p>
      <p>Topline: <?php echo $_SESSION['stockedit']['topline'];?></p>
      <p>Date: <?php echo $_SESSION['stockedit']['date'];?></p>
      <p>Photo: <?php echo $_SESSION['stockedit']['bigphoto'];?></p>
      <img class="img-fluid" src="images/<?php echo $_SESSION['stockedit']['bigphoto'];?>" alt="" width="200">
      <p>Description: <?php echo $_SESSION['stockedit']['description'];?></p>
    <?php }
    ?>
    <p>
      <a class="btn btn-danger" href="index.php?page=stockedit">Oops, go back</a>
      <a class="btn btn-success" href="index.php?page=updatestockedit">Correct, continue</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>