<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 26/01/2019
 * Time: 8:43 AM
 */
  $host = "localhost";
  $name = "root";
  $password = "";
  $dbname = "vsbooks";
  $dbc = mysqli_connect($host, $name, $password, $dbname)
    or die("connect error:" . mysqli_connect_error());
?>