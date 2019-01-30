<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 28/01/2019
 * Time: 9:04 AM
 */
  include "dbconnect.php";
  if (!isset($_GET['id'])){
    header("Location:index.php");
  }
  // select all stock items belonging to the selected id
  $st_sql = "SELECT stocks.name, stocks.thumbnail, stocks.date, stocks.id, categories.name AS ct_name 
    FROM stocks JOIN categories ON stocks.categoryID=categories.id WHERE stocks.categoryID=".$_GET['id'];
  $st_qry = mysqli_query($dbc, $st_sql);
  $st_rs = mysqli_fetch_assoc($st_qry);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <?php
      if (mysqli_num_rows($st_qry) == 0){
        echo "<h1>Sorry, we have no item currently in stock</h1>";
      }else{ ?>
        <h1><?php echo $st_rs['ct_name']?></h1>
        <div class="row pl-3">
          <?php do{ ?>
            <div class="col-lg-2 col-md-3 col-sm-6 p-0 pr-3">
              <a href="index.php?page=item&id=<?php echo $st_rs['id']?>">
                <div class="card mb-3">
                  <img class="card-img-top" src="images/<?php echo $st_rs['thumbnail']?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $st_rs['name']?></h5>
                    <p class="card-text">This is a longer card with <supporting></supporting>.</p>
                    <p class="card-text"><small class="text-muted"><?php echo date("d/m/Y", strtotime($st_rs['date']))?></small></p>
                  </div>
                </div>
              </a>
            </div>
          <?php }while($st_rs = mysqli_fetch_assoc($st_qry));?>
        </div>
        <hr class="featurette-divider">
      <?php }
    ?>
  </div>
</div>

