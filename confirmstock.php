<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 31/01/2019
 * Time: 1:57 PM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_POST['submit'])){
    $_SESSION['addstock']['name'] = $_POST['name'];
    $_SESSION['addstock']['categoryID'] = $_POST['categoryID'];
    $_SESSION['addstock']['price'] = $_POST['price'];
    $_SESSION['addstock']['date'] = $_POST['date'];
    $_SESSION['addstock']['topline'] = $_POST['topline'];
    $_SESSION['addstock']['description'] = $_POST['description'];
  }else{
    header("Location:index.php");
  } ?>
  <div class="container">
    <div class="content col bg-light pb-4 pt-5">
      <hr class="featurette-divider">
      <div class="text-center">
      <?php if ($_FILES['fileToUpload']['name'] != "") {
        $_SESSION['addstock']['bigphoto'] = $_FILES['fileToUpload']['name'];
        $_SESSION['addstock']['thumbnail'] = $_FILES['fileToUpload']['name'];
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
            <h1>Confirm Item</h1>
            <p>Name: <?php echo $_SESSION['addstock']['name']?></p>
            <p>Category: <?php
              $ct_sql = "SELECT * FROM categories WHERE id=".$_SESSION['addstock']['categoryID'];
              $ct_qry = mysqli_query($dbc, $ct_sql);
              $ct_rs = mysqli_fetch_assoc($ct_qry);
              echo $ct_rs['name'];
              do{ ?>

              <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
            ?></p>
            <p>Price: <?php echo $_SESSION['addstock']['price']?></p>
            <p>Date: <?php echo $_SESSION['addstock']['date']?></p>
            <p>Topline: <?php echo $_SESSION['addstock']['topline']?></p>
            <p>Photo: <?php echo $_SESSION['addstock']['bigphoto']?></p>
            <img src="images/<?php echo $_SESSION['addstock']['bigphoto']?>" alt="" width="200" class="pb-3 img-fluid">
            <p>Description: <?php echo $_SESSION['addstock']['description']?></p>
          <?php } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
      // the code below only runs if no image is selected
      else{
        $_SESSION['addstock']['bigphoto'] = "image.jpg";
        $_SESSION['addstock']['thumbnail'] = "image.jpg";
        ?>
        <h1>Confirm Item</h1>
        <p>Name: <?php echo $_SESSION['addstock']['name']?></p>
        <p>Category: <?php
          $ct_sql = "SELECT * FROM categories WHERE id=".$_SESSION['addstock']['categoryID'];
          $ct_qry = mysqli_query($dbc, $ct_sql);
          $ct_rs = mysqli_fetch_assoc($ct_qry);
          echo $ct_rs['name'];
          do{ ?>

          <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
          ?></p>
        <p>Price: <?php echo $_SESSION['addstock']['price']?></p>
        <p>Date: <?php echo $_SESSION['addstock']['date']?></p>
        <p>Topline: <?php echo $_SESSION['addstock']['topline']?></p>
        <p>Photo: <?php echo $_SESSION['addstock']['bigphoto']?></p>
        <img src="images/<?php echo $_SESSION['addstock']['bigphoto']?>" alt="" width="200" class="pb-3 img-fluid">
        <p>Description: <?php echo $_SESSION['addstock']['description']?></p>
      <?php }
      ?>
        <p>
          <a class="btn btn-danger" href="index.php?page=addstock">Oops, go back</a>
          <a class="btn btn-success" href="index.php?page=enterstock">Correct, continue</a>
        </p>
      </div>
      <hr class="featurette-divider">
    </div>
  </div>
