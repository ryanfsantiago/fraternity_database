<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<?php
	$renew_id=$_POST['org'];
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
	
	
	$sql = "INSERT INTO adviser (lastname, firstname, mi, gender, bdate,contact_no,address) VALUES ('$lname','$fname','$miname','$gender','$date','$contact','$address')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
	
	
	mysql_select_db("osa_organization", $conn);
		$result2 = mysql_query("SELECT adviser_id from adviser where lastname='$lname' and firstname='$fname' and mi='$miname'");
		$row2 = mysql_fetch_array($result2);
		$adviser_id = $row2['adviser_id'];
	
	$sql = "INSERT INTO organization_has_adviser VALUES ('$pos','$tenure','$ys','$civil','$adviser_id','$renew_id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
			echo '<a href="adviserinfo.php">back to menu</a>'

?>




