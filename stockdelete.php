<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 01/02/2019
 * Time: 8:55 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Delete Category</h1>
    <?php
    $st_sql = "DELETE FROM stocks WHERE id=".$_GET['id'];
    $st_qry = mysqli_query($dbc, $st_sql);
    ?>
    <p>Item has successfully been deleted</p>
    <p><a class="btn btn-danger" href="index.php?page=admin">Return to admin panel</a></p>
    <hr class="featurette-divider">
  </div>
</div>