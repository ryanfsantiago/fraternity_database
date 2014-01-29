<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>
<?php
	$mid=$_POST['mid'];
	$rid=$_POST['rid'];
	
	
	$sy=$_POST['sy'];
	$position=$_POST['position'];
	$cat=$_POST['category'];
	$renew_id=$_POST['org'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$miname=$_POST['miname'];
	$date=$_POST['date'];
	$gender=$_POST['gender'];
	$course=$_POST['course'];
	$year=$_POST['year'];
	
	
	$barangay=$_POST['barangay'];
	$municipality=$_POST['municipality'];
	$province=$_POST['province'];
	$adtype=$_POST['adtype'];
	
	$cadtype=$_POST['cadtype'];
	
	
	
	$sql = "Update member set lastname = '$lname', firstname = '$fname', mi='$miname' , bdate = '$date', gender= '$gender' where member_id= '$mid'";
	
	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}

?>




<?php

	
	
	$sql = "UPDATE address SET brgy='$barangay', municipality='$municipality', province='$province' where member_id='$mid' and type='Home Address'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>

<?php

	$cbarangay=$_POST['cbarangay'];
	$cmunicipality=$_POST['cmunicipality'];
	$cprovince=$_POST['cprovince'];
	
	$sql = "UPDATE address SET brgy='$cbarangay', municipality='$cmunicipality', province='$cprovince' where member_id='$mid' and type='Clsu Address'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>



<?php

	$plname=$_POST['plname'];
	$pfname=$_POST['pfname'];
	$ptype=$_POST['ptype'];
	$mplname=$_POST['mplname'];
	$mpfname=$_POST['mpfname'];
	$mptype=$_POST['mptype'];
	$gplname=$_POST['gplname'];
	$gpfname=$_POST['gpfname'];
	$gptype=$_POST['gptype'];
	
	$sql = "Update parents set lastname='$plname', firstname='$pfname' where type='father'  and member_id = '$mid'"; 

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>
<?php
$sql = "Update parents set lastname='$mplname', firstname='$mpfname' where type='mother'  and member_id = '$mid'"; 

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());}
?>
<?php
$sql = "Update parents set lastname='$gplname', firstname='$gpfname' where type='guardian'  and member_id = '$mid'"; 

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());}

?>


<?php
	$skills=$_POST['skills'];

	
	$sql = "update skill set type='$skills' where member_id= '$mid'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>

<?php
	
	$sql = "update member_has_organization set position='$position',course='$course',year='$year' where renew_id='$rid' and member_id='$mid'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Member's Information successfully edited!";
					echo '<a href="memberorg.php">Back to Menu</a>';
?>

