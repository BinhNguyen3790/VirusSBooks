<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 30/01/2019
 * Time: 3:04 PM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Add New Item</h1>
    <form method="post" action="index.php?page=confirmaddstock" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="<?php echo $_SESSION['addcategory']['name']?>" class="form-control" placeholder="Enter name" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Topline</label>
        <input type="text" name="topline" value="<?php echo $_SESSION['addcategory']['topline']?>" class="form-control" placeholder="Enter topline" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" value="<?php echo $_SESSION['addcategory']['date']?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Photo</label>
        <input type="file" name="photo" class="form-control mb-2" required>
        <img class="img-fluid" src="images/<?php echo $_SESSION['addcategory']['photo']?>" alt="" width="200">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" value="<?php echo $_SESSION['addcategory']['description']?>" class="form-control" placeholder="Enter description" required>
        <small id="emailHelp" class="form-text text-muted">Only admin can change database.</small>
      </div>
      <a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a>
      <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
    </form>
    <hr class="featurette-divider">
  </div>
</div>