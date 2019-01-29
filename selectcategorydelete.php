<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 29/01/2019
 * Time: 2:38 PM
 */
  session_start();
  include ("dbconnect.php");
  //check
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1>Delete Category Select</h1>
    <?php
      $ct_sql = "SELECT * FROM categories";
      $ct_qry = mysqli_query($dbc, $ct_sql);
      $ct_rs = mysqli_fetch_assoc($ct_qry);
      do{ ?>
        <p><a href="index.php?page=confirmcategorydelete&id=<?php echo $ct_rs['id']?>"><?php echo $ct_rs['name']?></a></p>
      <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
    ?>
    <hr class="featurette-divider">
  </div>
</div>