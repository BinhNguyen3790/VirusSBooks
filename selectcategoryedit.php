<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 30/01/2019
 * Time: 8:00 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  unset($_SESSION['categoryedit']);
  $ct_sql = "SELECT * FROM categories";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Edit Category</h1>
    <div class="row m-0 text-center">
    <?php
      do{ ?>
        <div class="list-group col-md-4 mb-3">
          <a href="index.php?page=categoryedit&id=<?php echo $ct_rs['id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><?php echo $ct_rs['name']?></h5>
              <small class="text-muted"><?php echo date("d/m/Y", strtotime($ct_rs['date']));?></small>
            </div>
            <p class="mb-1"><img class="img-fluid" src="images/<?php echo $ct_rs['photo']?>" alt=""></p>
            <small class="text-muted"><?php echo $ct_rs['topline']?></small>
          </a>
        </div>
      <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
    ?>
    </div>
    <a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a>
    <hr class="featurette-divider">
  </div>
</div>
