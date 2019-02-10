<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 30/01/2019
 * Time: 8:36 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
  if (isset($_POST['update'])){
    $_SESSION['categoryedit']['name'] = $_POST['name'];
    $_SESSION['categoryedit']['topline'] = $_POST['topline'];
    $_SESSION['categoryedit']['date'] = $_POST['date'];
    $_SESSION['categoryedit']['description'] = $_POST['description'];
  }else{
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <?php if ($_FILES['fileToUpload']['name'] != "") {
      $_SESSION['categoryedit']['photo']  = $_FILES['fileToUpload']['name'];
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
        echo "<span class='text-danger'>You still want to add</span>";
        $ck_sql = "SELECT * FROM categories WHERE id =".$_SESSION['categoryedit']['id'];
        $ck_qry = mysqli_query($dbc, $ck_sql);
        $ck_rs = mysqli_fetch_assoc($ck_qry);
        $_SESSION['categoryedit']['photo'] = $ck_rs['photo'];
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
          <h1>Confirm Category To Delete</h1>
          <p>Name: <?php echo $_SESSION['categoryedit']['name'];?></p>
          <p>Topline: <?php echo $_SESSION['categoryedit']['topline'];?></p>
          <p>Date: <?php echo $_SESSION['categoryedit']['date'];?></p>
          <p>Photo: <?php echo $_SESSION['categoryedit']['photo'];?></p>
          <img class="img-fluid" src="images/<?php echo $_SESSION['categoryedit']['photo'];?>" alt="" width="200">
          <p>Description: <?php echo $_SESSION['categoryedit']['description'];?></p>
        <?php } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
    // the code below only runs if no image is selected
    else{
      $_SESSION['categoryedit']['photo'] = "image.jpg";
      ?>
      <h1>Confirm Category To Delete</h1>
      <p>Name: <?php echo $_SESSION['categoryedit']['name'];?></p>
      <p>Topline: <?php echo $_SESSION['categoryedit']['topline'];?></p>
      <p>Date: <?php echo $_SESSION['categoryedit']['date'];?></p>
      <p>Photo: <?php echo $_SESSION['categoryedit']['photo'];?></p>
      <img class="img-fluid" src="images/<?php echo $_SESSION['categoryedit']['photo'];?>" alt="" width="200">
      <p>Description: <?php echo $_SESSION['categoryedit']['description'];?></p>
    <?php }
    ?>
    <p>
      <a class="btn btn-danger" href="index.php?page=categoryedit">Oops, go back</a>
      <a class="btn btn-success" href="index.php?page=updatecategoryedit">Confirm</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>