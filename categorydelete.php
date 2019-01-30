<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 29/01/2019
 * Time: 4:05 PM
 */
  session_start();
  include "dbconnect.php";
  // check admin
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
?>

<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Delete Category</h1>
    <?php
      $ct_sql = "DELETE FROM categories WHERE id=".$_GET['id'];
      $ct_qry = mysqli_query($dbc, $ct_sql);
      $sk_sql = "DELETE FROM stocks WHERE categoryID=".$_GET['id'];
      $sk_qry = mysqli_query($dbc, $sk_sql);
    ?>
    <p>Category has successfully been deleted</p>
    <p><a class="btn btn-danger" href="index.php?page=admin">Return to admin panel</a></p>
    <hr class="featurette-divider">
  </div>
</div>
