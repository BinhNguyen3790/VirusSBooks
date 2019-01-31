<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 31/01/2019
 * Time: 3:45 PM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  // Add new stock item to the database
  $st_sql = "INSERT INTO stocks (name, categoryID, price, date, bigphoto, thumbnail, topline, description) 
    VALUES ('".mysqli_real_escape_string($dbc, $_SESSION['addstock']['name'])."', 
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['categoryID'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['price'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['date'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['bigphoto'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['thumbnail'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['topline'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['description'])."'
    )";
  $st_qry = mysqli_query($dbc, $st_sql);
  // unset the addstock session
  unset($_SESSION['addstock']);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Add Item</h1>
    <p>New item has been entered</p>
    <p>
      <a class="btn btn-danger" href="index.php?page=admin">Return to admin panel</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>