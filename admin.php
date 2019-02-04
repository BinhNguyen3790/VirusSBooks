<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 28/01/2019
 * Time: 3:06 PM
 */
  session_start();
  include "dbconnect.php";
  // if login has been submitter, check if username, password, status and role match
  if (isset($_POST['login'])){
    $lg_sql = "SELECT * FROM users WHERE name='".$_POST['name']."' AND password='".sha1($_POST['password'])."' AND status='1' AND role='1'";
    $lg_qry = mysqli_query($dbc, $lg_sql);
    $lg_rs = mysqli_fetch_assoc($lg_qry);
    $_SESSION['admin'] = $lg_rs['name'];
  }
  unset($_SESSION['addcategory']);
  // check to see if user is logging out
  if (isset($_GET['action'])){
    if ($_GET['action']=='logout'){
      unset($_SESSION['admin']);
    }
  }
  if (!isset($_SESSION['admin'])){
    include "login.php";
  }else{ ?>
    <div class="container">
      <div class="content col bg-light pb-4 pt-5">
        <hr class="featurette-divider">
        <div class="row">
          <div class="col-md-5">
            <ul class="list-group bg-dark text-light p-3 rounded text-center">
              <h1>Admin Panel</h1>
              <a href="index.php?page=admin&action=logout" class="list-group-item list-group-item-danger rounded">
                Logout
              </a>
              <h1>Category</h1>
              <a href="index.php?page=addcategory" class="list-group-item list-group-item-success rounded-top">
                Add New Category
              </a>
              <a href="index.php?page=selectcategoryedit" class="list-group-item list-group-item-warning rounded-top">
                Edit Category
              </a>
              <a href="index.php?page=selectcategorydelete" class="list-group-item list-group-item-danger rounded-top">
                Delete Category
              </a>
              <h1>Item</h1>
              <a href="index.php?page=addstock" class="list-group-item list-group-item-success rounded-top">
                Add New Item
              </a>
              <a href="index.php?page=selectstockedit" class="list-group-item list-group-item-warning rounded-top">
                Edit Item
              </a>
              <a href="index.php?page=selectstockdelete" class="list-group-item list-group-item-danger rounded-top">
                Delete Item
              </a>
            </ul>
            <table class="table table-hover table-dark mt-3 table-responsive">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">status</th>
                    <th scope="col">progress</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><label class="bg-success rounded pr-3 pl-3">Active</label></td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td><label class="bg-success rounded pr-3 pl-3">Active</label></td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td><label class="bg-success rounded pr-3 pl-3">Active</label></td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
<!--            <div class="row">-->
<!--              <div class="col-md-6">-->
<!--                <a href="#">-->
<!--                  <div class="card text-white bg-dark mb-3">-->
<!--                    <div class="card-header">Header</div>-->
<!--                    <div class="card-body">-->
<!--                      <h5 class="card-title">Dark card title</h5>-->
<!--                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </a>-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                <a href="#">-->
<!--                  <div class="card text-white bg-dark mb-3">-->
<!--                    <div class="card-header">Header</div>-->
<!--                    <div class="card-body">-->
<!--                      <h5 class="card-title">Dark card title</h5>-->
<!--                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </a>-->
<!--              </div>-->
<!--            </div>-->
          </div>
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12">
                <canvas id="myChart"></canvas>
                <script>
                  var ctx = document.getElementById("myChart").getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                      datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero:true
                          }
                        }]
                      }
                    }
                  });
                </script>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                      <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                        <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                        <span>jack Menqu</span>
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <i class="mdi mdi-clock icon-sm mr-2"></i>
                        <span>October 3rd, 2018</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6 pr-1">
                        <img src="images/banner.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="images/banner0.jpg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                      <div class="col-6 pl-1">
                        <img src="images/banner0.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="images/banner.jpg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      <img src="images/login.jpg" class="img-sm rounded-circle mr-3" alt="image">
                      <div class="mb-0 flex-grow">
                        <h5 class="mr-2 mb-2">School Website - Authentication Module.</h5>
                        <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable
                          content of a page.</p>
                      </div>
                      <div class="ml-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="featurette-divider">
      </div>
    </div>
  <?php }
?>

