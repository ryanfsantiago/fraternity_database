<?php 
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: login.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  mysql_select_db("osa_organization", $con);
	  $sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>

<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Form</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">



</style>
	<script src="script/jquery-2.0.3.min"></script>
    <script src="slider/sliderengine/jquery.js"></script>
    <script src="slider/sliderengine/amazingslider.js"></script>
    <script src="slider/sliderengine/initslider-1.js"></script>

</head>
<body>
<div id="header"><a href="http://clsu.edu.ph/">
<img src="images/head.png" height="60" width="500" /></a>
</div>

<div id="allcontent">

<ul id="nav">
	
	<li><a href="home.php">Home</a> </li>
	<li><a href="#"> Record Management</a> </a>
	
	<ul>
        <li class=""> <a href="manageorginfo.php">Organizations</a> </li>
        <li class=""> <a href="adviserinfo.php">Advisers</a> </li>
        <li class=""> <a href="memberorg.php">Members</a> </li>
		<li class=""> <a href="manageactivities.php">Activities</a> </li>
    </ul>
	</li>
	

    
		 <li class=""> <a href="renewal.php">Renew Organization</a> </li>
         
               
   
	
	<li><a href="report.php"> Reports</a></li>
	<li><a href="logout.php"> Logout</a></li>
	</ul>

	

	
	
 
<div id="banner">
<img src="images/osa_logo.png" height="100" width="100" />
</div> 
<hr />
