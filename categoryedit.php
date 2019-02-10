<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 30/01/2019
 * Time: 8:10 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_GET['id'])) {
    $_SESSION['categoryedit']['id'] = $_GET['id'];
  }
  if (!isset($_SESSION['categoryedit']['name']) && !isset($_SESSION['categoryedit']['topline']) &&
    !isset($_SESSION['categoryedit']['date']) && !isset($_SESSION['categoryedit']['photo']) &&
    !isset($_SESSION['categoryedit']['description'])){
    $ct_sql = "SELECT * FROM categories WHERE id=".$_GET['id'];
    $ct_qry = mysqli_query($dbc, $ct_sql);
    $ct_rs = mysqli_fetch_assoc($ct_qry);
    $_SESSION['categoryedit']['name'] = $ct_rs['name'];
    $_SESSION['categoryedit']['topline'] = $ct_rs['topline'];
    $_SESSION['categoryedit']['date'] = $ct_rs['date'];
    $_SESSION['categoryedit']['photo'] = "image.jpg";
    $_SESSION['categoryedit']['description'] = $ct_rs['description'];
    $_SESSION['categoryedit']['id'] = $ct_rs['id'];
  }else{
    if ($_SESSION['categoryedit']['photo'] != "image.jpg"){
      unlink("images/".$_SESSION['categoryedit']['photo']);
      $_SESSION['categoryedit']['photo'] = "image.jpg";
    }
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Edit Category</h1>
    <form action="index.php?page=confirmcategoryedit" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="<?php echo $_SESSION['categoryedit']['name']?>" class="form-control" placeholder="Enter name" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Topline</label>
        <input type="text" name="topline" value="<?php echo $_SESSION['categoryedit']['topline']?>" class="form-control" placeholder="Enter topline" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" value="<?php echo $_SESSION['categoryedit']['date']?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-2" accept="image/*" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" value="<?php echo $_SESSION['categoryedit']['description']?>" class="form-control" placeholder="Enter description">
        <small id="emailHelp" class="form-text text-muted">Only admin can change database.</small>
      </div>
      <a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
    <hr class="featurette-divider">
  </div>
</div>

