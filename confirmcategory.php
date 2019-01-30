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
  if (!isset($_POST['submit'])){
    header("Location:index.php?page=admin");
  }
  // set addcategory session
  $_SESSION['addcategory']['name'] = $_POST['name'];
  $_SESSION['addcategory']['topline'] = $_POST['topline'];
  $_SESSION['addcategory']['date'] = $_POST['date'];
  $_SESSION['addcategory']['photo'] = $_POST['photo'];
  $_SESSION['addcategory']['description'] = $_POST['description'];
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <div class="text-center">
      <h1 class="pb-2">Confirm Category</h1>
      <p>Name: <?php echo $_POST['name']?></p>
      <p>Toline: <?php echo $_POST['topline']?></p>
      <p>Photo: <?php echo $_POST['photo']?></p>
      <img src="images/<?php echo $_POST['photo']?>" alt="" width="200" class="pb-3 img-fluid">
      <p class="">Date: <?php echo $_POST['date']?></p>
      <p>Description: <?php echo $_POST['description']?></p>
      <p>
        <a class="btn btn-danger" href="index.php?page=addcategory">Oops, go back</a>
        <a class="btn btn-success" href="index.php?page=entercategory">Correct, continue</a>
      </p>
    </div>
    <hr class="featurette-divider">
  </div>
</div>