<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 30/01/2019
 * Time: 8:58 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  $ct_sql = "UPDATE categories SET name='".$_SESSION['categoryedit']['name']."', topline='".$_SESSION['categoryedit']['topline']."', 
    date='".$_SESSION['categoryedit']['date']."', photo='".$_SESSION['categoryedit']['photo']."', description='".$_SESSION['categoryedit']['description']."' WHERE id=".$_SESSION['categoryedit']['id'];
  $ct_qry = mysqli_query($dbc, $ct_sql);
  unset($_SESSION['categoryedit']);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Update Categoory</h1>
    <p>Category successfully update</p>
    <p>
      <a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>