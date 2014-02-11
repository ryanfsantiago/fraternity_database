<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<?php
	$renew_id=$_POST['rid'];
	$aid=$_POST['aid'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$miname=$_POST['miname'];
	$gender=$_POST['gender'];
	$date=$_POST['date'];
	
	
	$ys= $_POST['yearsofservice'];
	$pos=$_POST['position'];
	$tenure=$_POST['tenure'];
	$civil= $_POST['civil_status'];
	$contact = $_POST['contact'];
	$address= $_POST['address'];
	
	
	$sql = "Update adviser set lastname='$lname', firstname='$fname', mi='$miname', gender='$gender', bdate ='$date', address= '$address', contact_no = '$contact' where adviser_id= '$aid' ";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					
	
	
	
	
	$sql = "UPDATE organization_has_adviser SET position='$pos',status_of_appointment='$tenure',years_of_service='$ys',civil_status='$civil' where adviser_id='$aid' and renew_id='$renew_id'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully updated!";
			echo '<a href="adviserinfo.php">back to menu</a>'

?>




