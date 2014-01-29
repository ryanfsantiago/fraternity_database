<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<!--ORGANIZATION-->

<?php
	$orgname=$_POST['orgname'];
	$orgdescription=$_POST['orgdescription'];
	$date=$_POST['date'];

	
	$sql = "INSERT INTO organization ( name, description, date_estb) 
	VALUES ('$orgname', '$orgdescription', '$date')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
					echo "<a href=".'addorg.php'.">Back to Menu</a>";

?>



<!--ADVISER-->

<?php
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$miname=$_POST['miname'];
	$gender=$_POST['gender'];
	$date=$_POST['date'];
	
	$sql = "INSERT INTO adviser (lastname, firstname, mi, gender, bdate) VALUES ('$lname','$fname','$miname','$gender','$date')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>



<?php
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$miname=$_POST['miname'];
	$gender=$_POST['gender'];
	$date=$_POST['date'];
	
	$sql = "INSERT INTO adviser (lastname, firstname, mi, gender, bdate) VALUES ('$lname','$fname','$miname','$gender','$date')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>



<!--MEMBERS-->

<?php
	$id=$_POST['id'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$miname=$_POST['miname'];
	$date=$_POST['date'];
	$gender=$_POST['gender'];
	$course=$_POST['course'];
	$year=$_POST['year'];
	
	$sql = "INSERT INTO member (member_id, lastname, firstname, mi, bdate, gender, course, year) 
	VALUES ('$id','$lname', '$fname', '$miname', '$date', '$gender', '$course', '$year')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>




<?php
	$id=$_POST['id'];
	$addnumber=$_POST['addnumber'];
	$barangay=$_POST['barangay'];
	$municipality=$_POST['municipality'];
	$province=$_POST['province'];
	$type=$_POST['type'];
	
	$sql = "INSERT INTO address (addno, brgy, municipality, province, type,member_id) VALUES ('$addnumber','$barangay','$municipality','$province','$type','$id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>





<?php
	$id=$_POST['id'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$type=$_POST['type'];
	
	
	$sql = "INSERT INTO parents (lastname, firstname, type, member_id) VALUES ('$lname','$fname','$type','$id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>




<?php
	$id=$_POST['id'];
	$skills=$_POST['skills'];

	
	$sql = "INSERT INTO skill ( type,member_id) VALUES ('$type','$id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>

