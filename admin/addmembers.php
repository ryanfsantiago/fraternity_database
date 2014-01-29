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
	
	$sql = "INSERT INTO member ( lastname, firstname, mi, bdate, gender) 
	VALUES ('$lname', '$fname', '$miname', '$date', '$gender')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

?>




<?php
mysql_select_db("osa_organization", $conn);
$result2 = mysql_query("SELECT member_id FROM member where lastname='$lname' and firstname='$fname' and  mi ='$miname'");
$row2 = mysql_fetch_array($result2);
	$id = $row2['member_id'];
	$barangay=$_POST['barangay'];
	$municipality=$_POST['municipality'];
	$province=$_POST['province'];
	$adtype=$_POST['adtype'];
	$cbarangay=$_POST['cbarangay'];
	$cmunicipality=$_POST['cmunicipality'];
	$cprovince=$_POST['cprovince'];
	$cadtype=$_POST['cadtype'];
	$sql = "INSERT INTO address ( brgy, municipality, province, type,member_id) VALUES ('$barangay','$municipality','$province','$adtype','$id'),('$cbarangay','$cmunicipality','$cprovince','$cadtype','$id')";

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
	
	$sql = "INSERT INTO parents (lastname, firstname, type, member_id) VALUES ('$plname','$pfname','$ptype','$id'),('$mplname','$mpfname','$mptype','$id'),('$gplname','$gpfname','$gptype','$id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>




<?php
	$skills=$_POST['skills'];

	
	$sql = "INSERT INTO skill ( type,member_id) VALUES ('$skills','$id')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					

?>

<?php
	
	$sql = "INSERT INTO member_has_organization VALUES ('$renew_id','$id','$position','$course','$year')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
					echo '<a href="memberorg.php">Back to Menu</a>'
?>

