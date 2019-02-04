<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 01/02/2019
 * Time: 8:45 AM
 */
  session_start();
  include "dbconnect.php";
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5 text-center">
    <hr class="featurette-divider">
    <h1>Confirm Item To Delete</h1>
    <?php
    $st_sql = "SELECT * FROM stocks WHERE id=".$_GET['id'];
    $st_qry = mysqli_query($dbc, $st_sql);
    $st_rs = mysqli_fetch_assoc($st_qry);
    ?>
    <p>Do you really wish to delete <span class="text-danger"><?php echo $st_rs['name']?></span>?</p>
    <p>
      <a class="btn btn-danger" href="index.php?page=selectstockdelete">No, Go Back</a>
      <a class="btn btn-success" href="index.php?page=stockdelete&id=<?php echo $_GET['id']?>">Yes, delete it!</a>
    </p>
    <hr class="featurette-divider">
  </div>
</div>

