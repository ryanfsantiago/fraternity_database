<?php
$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

 ?><?php 
  

echo "<a href='activityreport.php?q=".$q."&r=".$r."&s=".$s."'><input type='button' value='Print Activities'></a><br><br>";
echo "<a href='memberreport.php?q=".$q."&r=".$r."&s=".$s."'><input type='button' value='Print Roster of Members & Advisers'></a><br><br>";
echo "<br><br><br>";


?>