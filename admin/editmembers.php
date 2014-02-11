<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>
<?php

$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 

	$result2 = mysql_query("SELECT * FROM member WHERE member_id=".$_POST['mid']."");
	while($row=mysql_fetch_array($result2))
	{
		$deletion="photo/". $row['photo'];
		$test=$file;
		
		if($name1 == "" || $name1 == "default.jpg"){
		echo 'no file chosen';
		}
		else if (!unlink($deletion))
	  {
	  echo ("Error in deleting Image $deletion ");
	  }
	else
	  {

if($name1!="")
{


move_uploaded_file ($tmppath,'photo/'.$name1);






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
	$contact = $_POST['contact'];
	$photo = $name1;
	
	
	$barangay=$_POST['barangay'];
	$municipality=$_POST['municipality'];
	$province=$_POST['province'];
	$adtype=$_POST['adtype'];
	
	$cadtype=$_POST['cadtype'];
	
	
	
	$sql = "Update member set lastname = '$lname', firstname = '$fname', mi='$miname' , bdate = '$date', gender= '$gender' ,  contact_no= '$contact' , photo = '$photo' where member_id= '$mid'";
	
	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}


	
	
	$sql = "UPDATE address SET brgy='$barangay', municipality='$municipality', province='$province' where member_id='$mid' and type='Home Address'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					



	$cbarangay=$_POST['cbarangay'];
	$cmunicipality=$_POST['cmunicipality'];
	$cprovince=$_POST['cprovince'];
	
	$sql = "UPDATE address SET brgy='$cbarangay', municipality='$cmunicipality', province='$cprovince' where member_id='$mid' and type='Clsu Address'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					



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
					


$sql = "Update parents set lastname='$mplname', firstname='$mpfname' where type='mother'  and member_id = '$mid'"; 

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());}

$sql = "Update parents set lastname='$gplname', firstname='$gpfname' where type='guardian'  and member_id = '$mid'"; 

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());}


	$skills=$_POST['skills'];

	
	$sql = "update skill set type='$skills' where member_id= '$mid'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					


	$sql = "update member_has_organization set pos_id='$position',course='$course',year='$year' where renew_id='$rid' and member_id='$mid'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Member's Information successfully edited!";
					echo '<a href="memberorg.php">Back to Menu</a>';

	}}}
?>

