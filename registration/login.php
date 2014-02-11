<?php 
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
session_start();
if (isset($_SESSION["passcode"])) {
    header("location: default.php"); 
    exit();
}
?>

<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["passcode"])) {
    $passcode = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["passcode"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
   $con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  mysql_select_db("osa_organization", $con);
    $sql = mysql_query("SELECT access_id FROM access_code WHERE code='$passcode' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["access_id"];
		 }
		
		 $_SESSION["passcode"] = $passcode;
		 header("location: default.php");
         exit();
    } else {
		echo 'That information is incorrect, try again <a href="default.php">Click Here</a>';
		exit();
	}
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
</head>
<body>
<div style="margin-top:80px"></div>
<div class="container">
<h2 class="form-signin-heading">Please sign in to access</h2>
<form name="form1" method="post" action="login.php" class="form-signin" role="form">
 
  
      <input class="form-control" name="passcode" type="password" id="mypassword" placeholder="Access Code">
    
  
      <button type="submit" name="Submit" value="Login" class="btn-lg btn-primary btn-block">Log in</button>
    
</form>
</div>

</body>
</html>