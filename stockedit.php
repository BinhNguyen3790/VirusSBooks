<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 01/02/2019
 * Time: 10:31 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_GET['id'])){
    $_SESSION['stockedit']['id']= $_GET['id'];
  }
  if (!isset($_SESSION['stockedit']['name'])){
    $st_sql = "SELECT * FROM stocks WHERE id=".$_GET['id'];
    $st_qry = mysqli_query($dbc, $st_sql);
    $st_rs = mysqli_fetch_assoc($st_qry);
    $_SESSION['stockedit']['name'] = $st_rs['name'];
    $_SESSION['stockedit']['categoryID'] = $st_rs['categoryID'];
    $_SESSION['stockedit']['price'] = $st_rs['price'];
    $_SESSION['stockedit']['date'] = $st_rs['date'];
    $_SESSION['addstock']['bigphoto'] = "image.jpg";
    $_SESSION['stockedit']['topline'] = $st_rs['topline'];
    $_SESSION['stockedit']['description'] = $st_rs['description'];
  }else{
    if ($_SESSION['addstock']['bigphoto']  != "image.jpg"){
      unlink("images/".$_SESSION['addstock']['bigphoto']);
    }
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Edit Category</h1>
    <form action="index.php?page=confirmstockedit" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="<?php echo $_SESSION['stockedit']['name']?>" class="form-control" placeholder="Enter name" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <select name="categoryID" class="form-control">
          <?php
          $ct_sql = "SELECT * FROM categories";
          $ct_qry = mysqli_query($dbc, $ct_sql);
          $ct_rs = mysqli_fetch_assoc($ct_qry);
          do{ ?>
            <option value="<?php echo $ct_rs['id']?>"
              <?php
              if ($ct_rs['id'] == $_SESSION['stockedit']['categoryID']){
                echo "selected=selected";
              }
              ?>
            >
              <?php echo $ct_rs['name']?>
            </option>
          <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" name="price" value="<?php echo $_SESSION['stockedit']['price']?>" class="form-control" placeholder="Enter topline" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Topline</label>
        <input type="text" name="topline" value="<?php echo $_SESSION['stockedit']['topline']?>" class="form-control" placeholder="Enter topline" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" value="<?php echo $_SESSION['stockedit']['date']?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-2">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" value="<?php echo $_SESSION['stockedit']['description']?>" class="form-control" placeholder="Enter description">
        <small id="emailHelp" class="form-text text-muted">Only admin can change database.</small>
      </div>
      <a class="btn btn-danger" href="index.php?page=selectstockedit">Oops, go back</a>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
    <hr class="featurette-divider">
  </div>
</div>

