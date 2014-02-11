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
<title>Admin OSA-SOU</title>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<a href="#" class="navbar-brand"><span style="font-family:sans serif"><img src="images/sample.png" style="width:20%;height:1%"></span></a>
		
		<button class = "navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<div class = "collapse navbar-collapse navHeaderCollapse">
		<ul class="nav navbar-nav navbar-right">
			<li class=""> <a href="home.php">Home</a> </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle = "dropdown">Record Management<b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li class=""> <a href="manageorginfo.php">Organizations</a> </li>
					<li class=""> <a href="adviserinfo.php">Advisers</a> </li>
					<li class=""> <a href="memberorg.php">Members</a> </li>
					<li class=""> <a href="manageactivities.php">Activities</a> </li>
					<li class="divider"></li>
					<li class=""><a href="renewal.php">Renew Organization</a></li>
					</ul>
				</li>  
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle = "dropdown">Pages<b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li><a href="newslist.php"> News</a></li>
					<li><a href="about.php"> About</a></li>
					</ul>
				</li>  
	<li><a href="report.php"> Reports</a></li>
	<li><a href="logout.php"> Logout</a></li>
		</ul>
		</div>
	
	</div>
</div>
<div style="margin-top:80px"></div>