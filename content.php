<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 25/01/2019
 * Time: 3:47 PM
 */
include ("dbconnect.php");
$ct_sql = "SELECT * FROM categories";
$ct_qry = mysqli_query($dbc, $ct_sql);
$ct_rs = mysqli_fetch_assoc($ct_qry);
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-2">
    <div id="carouselExampleIndicators" class="carousel slide mt-5 mb-5" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner text-light">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/banner.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Example headline.</h5>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <input class="btn btn-primary mb-3" type="button" value="Sign up today">
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/banner0.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block text-left">
            <h5>Example headline.</h5>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <input class="btn btn-warning mb-3" type="button" value="Learn more">
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/banner1.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block text-right">
            <h5>Example headline.</h5>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <input class="btn btn-success mb-3" type="button" value="Browse gallery">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Three columns of text below the carousel -->
    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider">
    <?php do{ ?>
      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading"><?php echo $ct_rs['name']?> <span class="text-muted"><?php echo $ct_rs['topline']?></span></h2>
          <p class="lead"><?php echo $ct_rs['description']?></p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="featurette-image img-fluid mb-5" data-src="holder.js/500x500/auto" style="width: 500px; height: 300px;" src="images/<?php echo $ct_rs['photo']?>" data-holder-rendered="true">
        </div>
      </div>
      <div class="row">
        <?php
        $st_sql = "SELECT * FROM stocks WHERE categoryID=".$ct_rs['id']." ORDER BY date DESC LIMIT 4";
        $st_qry = mysqli_query($dbc, $st_sql);
        $st_rs = mysqli_fetch_assoc($st_qry);
        do{?>
          <div class="col-md-3 col-sm-6 text-center mb-5">
            <img class="rounded-circle" src="images/<?php echo $st_rs['thumbnail']?>" alt="Generic placeholder image" width="100" height="100">
            <h2><?php echo $st_rs['name']?></h2>
            <p><?php echo $st_rs['topline']?></p>
            <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
          </div><!-- /.col-lg-4 -->
        <?php }while($st_rs = mysqli_fetch_assoc($st_qry)); ?>
      </div><!-- /.row -->
    <hr class="featurette-divider">
    <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry))?>
    <!-- /END THE FEATURETTES -->
  </div>
</div>
