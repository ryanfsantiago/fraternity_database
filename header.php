<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>OSA-SOU</title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

</head>


<body style="margin-bottom:80px;margin-top:80px">
<script src="jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<a href="#" class="navbar-brand"><span style="font-family:sans serif"><img src="images/sample.png" style="width:20%;height:1%"></span></a>
		
		<button class = "navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<div class = "collapse navbar-collapse navHeaderCollapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="default.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle = "dropdown">Recognized SOs<b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li><a href="so.php?category=1"> College-based</a></li>
					<li><a href="so.php?category=2"> Non-College based</a></li>
					<li><a href="so.php?category=3"> Fraternities/Sororities</a></li>
					<li><a href="so.php?category=4"> Campus Ministries</a></li>
					</ul>
				</li>  
			<li><a href="policies.php">Policies</a></li>
		</ul>
		</div>
	
	</div>
</div>
<div style="margin-top:80px"></div>