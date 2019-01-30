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
  $_SESSION['categoryedit']['name'] = $_POST['name'];
  $_SESSION['categoryedit']['topline'] = $_POST['topline'];
  $_SESSION['categoryedit']['date'] = $_POST['date'];
  $_SESSION['categoryedit']['photo'] = $_POST['photo'];
  $_SESSION['categoryedit']['description'] = $_POST['description'];
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Confirm Category To Delete</h1>
    <p>Name: <?php echo $_SESSION['categoryedit']['name'];?></p>
    <p>Topline: <?php echo $_SESSION['categoryedit']['topline'];?></p>
    <p>Date: <?php echo $_SESSION['categoryedit']['date'];?></p>
    <p>Photo: <?php echo $_SESSION['categoryedit']['photo'];?></p>
    <img class="img-fluid" src="images/<?php echo $_SESSION['categoryedit']['photo'];?>" alt="" width="200">
    <p>Description: <?php echo $_SESSION['categoryedit']['description'];?></p>
    <p>
      <a class="btn btn-danger" href="index.php?page=categoryedit">Oops, go back</a>
      <a class="btn btn-success" href="index.php?page=updatecategoryedit">Confirm</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>