<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 28/01/2019
 * Time: 5:52 PM
 */
  session_start();
  // check to see if user is logged in. If not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Add New Category</h1>
    <hr class="featurette-divider">
  </div>
</div>
