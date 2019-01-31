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
    header("Location:index.php");
  }
  //set session to blank if user has just entered this page from the admin panel
  if (!isset($_SESSION['addstock']['name']) && !isset($_SESSION['addstock']['categoryID']) && !isset($_SESSION['addstock']['price']) && !isset($_SESSION['addstock']['topline']) && !isset($_SESSION['addstock']['date'])
    && !isset($_SESSION['addstock']['description'])){
    $_SESSION['addstock']['name'] = "";
    $_SESSION['addstock']['categoryID'] = "";
    $_SESSION['addstock']['price'] = "";
    $_SESSION['addstock']['topline'] = "";
    $_SESSION['addstock']['date'] = "";
    $_SESSION['addstock']['bigphoto'] = "image.jpg";
    $_SESSION['addstock']['description'] = "";
  }else{
    if ($_SESSION['addstock']['bigphoto']  != "image.jpg"){
      unlink("images/".$_SESSION['addstock']['bigphoto']);
    }
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Add New Item</h1>
    <form method="post" action="index.php?page=confirmstock" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="<?php echo $_SESSION['addstock']['name']?>" class="form-control" placeholder="Enter name" required>
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
                  if ($ct_rs['id'] == $_SESSION['addstock']['categoryID']){
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
        <input type="number" name="price" value="<?php echo $_SESSION['addstock']['price']?>" class="form-control" placeholder="Enter price" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Topline</label>
        <input type="text" name="topline" value="<?php echo $_SESSION['addstock']['topline']?>" class="form-control" placeholder="Enter topline" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" value="<?php echo $_SESSION['addstock']['date']?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-2">
<!--        <img class="img-fluid" src="images/--><?php //echo $_SESSION['addstock']['bigphoto']?><!--" alt="" width="200">-->
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea class="form-control" name="description" id="" rows="5" required><?php echo $_SESSION['addstock']['description']?></textarea>
        <small id="emailHelp" class="form-text text-muted">Only admin can change database.</small>
      </div>
      <a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a>
      <button type="submit" name="submit" class="btn btn-primary">Add Item</button>
    </form>
    <hr class="featurette-divider">
  </div>
</div>