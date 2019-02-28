<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 26/01/2019
 * Time: 8:43 AM
 */
  $host = "ec2-54-243-128-95.compute-1.amazonaws.com";
  $name = "mhccfxpsotauoa";
  $password = "b1161b2943861aa68636c64bea12b6eb9abe91559adfddeb75e5daf4847adcdd";
  $dbname = "d3cgrg8ca4irte";
  $dbc = mysqli_connect($host, $name, $password, $dbname)
    or die("connect error:" . mysqli_connect_error());
?>
