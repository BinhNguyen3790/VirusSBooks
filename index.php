<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 25/01/2019
 * Time: 2:47 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/js.js"></script>
  <title>VirusSBooks</title>
</head>
<body>
<!--  Begin Header-->
  <header>
    <?php
      include "header.php";
    ?>
  </header>
<!--  End Header-->
<!--  Begin Main-->
  <main>
    <?php
      include "content.php";
    ?>
  </main>
<!--  End Main-->
<!--  Begin Footer-->
  <footer>
    <?php
      include "footer.php";
    ?>
  </footer>
<!--  End Footer-->
</body>
</html>
