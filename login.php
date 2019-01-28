<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 28/01/2019
 * Time: 3:39 PM
 */
?>
<div class="container">
  <div class="content col bg-light pb-4 pt-5">
    <hr class="featurette-divider">
    <h1 class="text-center mt-5">Login Now</h1>
    <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-10 col-md-6">
          <div class="card border-info">
            <div class="card-header">Sign in to continue</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 text-center">
                  <img src="images/login.jpg" class="img-fluid">
                  <h4 class="text-center">VirusS</h4>
                </div>
                <div class="col-md-8">
                  <form class="form-signin" action="index.php?page=admin" method="post">
                    <input type="text" class="form-control mb-2" placeholder="Name" required autofocus name="name">
                    <input type="password" class="form-control mb-2" placeholder="Password" required name="password">
                    <?php
                      if (isset($_POST['login']) && !isset($_SESSION['admin'])){
                        echo "<p><span class='text-danger'>Incorrect username or password</span></p>";
                      }
                    ?>
                    <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="login">Sign in</button>
                    <label class="checkbox float-left">
                      <input type="checkbox" value="remember-me">
                      Remember me
                    </label>
                    <a href="#" class="float-right">Need help?</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <a href="#" class="float-right pt-2">Create an account </a>
        </div>
      </div>
    </div>
    <hr class="featurette-divider">
  </div>
</div>

