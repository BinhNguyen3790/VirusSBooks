<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 28/01/2019
 * Time: 1:22 PM
 */
  // redirect back to index page if no stock id has been set
  if (!isset($_GET['id'])){
    header("Location:index.php");
  }
  $im_sql = "SELECT stocks.name, stocks.price, stocks.bigphoto, stocks.date, stocks.topline, 
    stocks.description, categories.name AS c_name FROM stocks JOIN categories 
    ON stocks.categoryID=categories.id WHERE stocks.id=".$_GET['id'];
  if ($im_qry = mysqli_query($dbc, $im_sql)){
    $im_rs = mysqli_fetch_assoc($im_qry); ?>
    <div class="container">
      <div class="content col bg-light pb-4 pt-5">
        <hr class="featurette-divider">
        <!-- Portfolio Item Row -->
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <img class="img-fluid" src="images/<?php echo $im_rs['bigphoto']?>" alt="">
          </div>
          <div class="col-md-8 col-sm-8"><h1 class="my-3"><?php echo $im_rs['name']?></h1>
            <ul class="list-group">
              <li class="list-group-item">Price: <span class="text-danger">$<?php echo $im_rs['price']?>.00</span></li>
              <li class="list-group-item">Date: <span class="text-danger"><?php echo date("d/m/Y", strtotime($im_rs['date']));?></span></li>
              <li class="list-group-item">Type: <span class="text-danger"><?php echo $im_rs['c_name']?></span></li>
            </ul>
            <a href="#" class="btn btn-success mt-3 p-2 col"><i class="fas fa-dollar-sign"></i> Buy Now</a>
            <a href="#" class="btn btn-danger mt-3 p-2 col"><i class="fas fa-cart-plus"></i> Add To Cart</a>
            <a href="#" class="btn btn-info mt-3 p-2 col"><i class="fas fa-envelope"></i> Contact Us</a>
            <h3 class="my-3"><?php echo $im_rs['topline']?></h3>
            <p><?php echo $im_rs['description']?></p>
          </div>
        </div>
        <!-- /.row -->
        <hr class="featurette-divider">
      </div>
    </div>
   <?php }
?>