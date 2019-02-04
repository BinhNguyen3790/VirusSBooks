<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 01/02/2019
 * Time: 1:49 PM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
  $st_sql = "UPDATE stocks SET name='".$_SESSION['stockedit']['name']."', 
   categoryID='".$_SESSION['stockedit']['categoryID']."',
   price='".$_SESSION['stockedit']['price']."',
   date='".$_SESSION['stockedit']['date']."',
   thumbnail='".$_SESSION['stockedit']['thumbnail']."',
   bigphoto='".$_SESSION['stockedit']['bigphoto']."',
   topline='".$_SESSION['stockedit']['topline']."',
   description='".$_SESSION['stockedit']['description']."' WHERE id=".$_SESSION['stockedit']['id'];
  $st_qry = mysqli_query($dbc, $st_sql);
  unset($_SESSION['stockedit']);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Update Item</h1>
    <p>Item successfully update</p>
    <p>
      <a class="btn btn-danger" href="index.php?page=admin">Return to admin panel</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>