<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>



<?php
	$sy=$_POST['sy'];
	$orgname=$_POST['orgname'];
	$description=$_POST['description'];
	$date=$_POST['date'];
	$cat=$_POST['cat'];
	$rdate=$_POST['rdate'];
	$sql = "INSERT INTO organization ( name, description, date_estb, cat_id) 
	VALUES ('$orgname', '$description', '$date','$cat')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					
	mysql_select_db("osa_organization", $conn);
	$result = mysql_query("SELECT org_no FROM organization where name='$orgname'");
	$row = mysql_fetch_array($result);
	$orgno=$row['org_no'];
			$sql = "INSERT INTO renewal (org_no, date_renewed, schoolyear) 
	VALUES ('$orgno','$rdate','$sy')";
	
	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
			
					echo "Adviser's Information successfully added!";
					echo "<a href=".'manageorginfo.php'.">Back to Menu</a>";

?>





