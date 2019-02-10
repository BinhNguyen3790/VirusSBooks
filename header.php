<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 25/01/2019
 * Time: 2:54 PM
 */
  include ("dbconnect.php");
  $ct_sql = "SELECT * FROM categories";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
?>
<div class="container fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php do{ ?>
              <a class="dropdown-item" href="index.php?page=category&id=<?php echo $ct_rs['id']?>"><?php echo $ct_rs['name']?>
                <?php
                  $st_sql = "SELECT COUNT('categoryID') AS count_cat FROM stocks WHERE stocks.categoryID=".$ct_rs['id'];
                  $st_qry = mysqli_query($dbc, $st_sql);
                  $st_rs = mysqli_fetch_assoc($st_qry);
                ?>
                <span class="badge badge-primary badge-pill float-right"><?php echo $st_rs['count_cat']?></span>
                <div class="dropdown-divider"></div>
              </a>
            <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=admin">Login</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</div>
