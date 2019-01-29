<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 29/01/2019
 * Time: 3:49 PM
 */
  session_start();
  include "dbconnect.php";
  //check
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Confirm Category To Delete</h1>
    <?php
      $ct_sql = "SELECT * FROM categories WHERE id=".$_GET['id'];
      $ct_qry = mysqli_query($dbc, $ct_sql);
      $ct_rs = mysqli_fetch_assoc($ct_qry);
      // check if there are any stock items in this category
      $ck_sql = "SELECT * FROM stocks WHERE categoryID=".$_GET['id'];
      $ck_qry = mysqli_query($dbc, $ck_sql);
      $ck_ct = mysqli_num_rows($ck_qry);
    ?>
    <p>
      <?php
        if ($ck_ct > 0){
          echo "Warning! There are ". $ck_ct ." stock item(s) in this category. If you delete the category they will
            also be removes from the database";
        }
      ?>
    </p>
    <p>Do you really wish to delete <?php echo $ct_rs['name']?>?</p>
    <p>
      <a href="index.php?page=categorydelete&id=<?php echo $_GET['id']?>">Yes, delete it!</a>
      <a href="index.php?page=selectcategorydelete">No, Go Back</a>
      <a href="index.php?page=admin">Back to admin panel</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>