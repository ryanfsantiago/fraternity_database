<?php
$q=$_GET["q"];

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

 ?><?php 
  

echo "<a href='orgreport.php?q=".$q."'><input type='button' value='Print List of Organizations'></a><br><br>";
echo "<a href='adviserreport.php?q=".$q."'><input type='button' value='Print List of Advisers'></a><br><br>";
echo "<a href='memberslist.php?q=".$q."'><input type='button' value='Print List of Members'></a><br><br>";

?>