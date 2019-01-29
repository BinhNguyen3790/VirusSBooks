<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 29/01/2019
 * Time: 1:15 PM
 */
  session_start();
  include "dbconnect.php";
  // check to see if user is logged in. If not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
  // check to see if user has submitted the add category form
  if (!isset($_SESSION['addcategory']['name']) && !isset($_SESSION['addcategory']['topline']) && !isset($_SESSION['addcategory']['date'])
  && !isset($_SESSION['addcategory']['photo']) && !isset($_SESSION['addcategory']['description'])){
    header("Location:index.php?page=admin");
  }
  // enter the new category
  $ct_sql = "INSERT INTO categories (name, topline, date, photo, description) VALUES('".
    mysqli_real_escape_string($dbc, $_SESSION['addcategory']['name'])."', '".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['topline'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['date'])."', '".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['photo'])."', 
    '".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['description'])."')";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  unset($_SESSION['addcategory']['name']);
  unset($_SESSION['addcategory']['topline']);
  unset($_SESSION['addcategory']['date']);
  unset($_SESSION['addcategory']['photo']);
  unset($_SESSION['addcategory']['description']);
?><div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <p>New Category Has Been Entered</p>
    <p><a href="index.php?page=admin">Return to admin panel</a></p>
    <hr class="featurette-divider">
  </div>
</div>
