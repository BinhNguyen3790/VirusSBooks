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
      $cy_sql = "SELECT * FROM categories WHERE id=".$_GET['id'];
      $cy_qry = mysqli_query($dbc, $cy_sql);
      $cy_rs = mysqli_fetch_assoc($cy_qry);
      $st_sql = "SELECT * FROM stocks WHERE categoryID=".$_GET['id'];
      $st_qry = mysqli_query($dbc, $st_sql);
      $st_rs = mysqli_fetch_assoc($st_qry);
      if ($st_rs['bigphoto'] != "image.jpg" && $st_rs['bigphoto'] != ""){
        unlink("images/".$st_rs['bigphoto']);
      }
      if ($cy_rs['photo'] != "image.jpg"){
        unlink("images/".$cy_rs['photo']);
      }
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
