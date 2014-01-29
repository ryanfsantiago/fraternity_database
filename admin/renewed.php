<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>




<?php
$org= $_POST['org'];
$date =$_POST['rdate'];
$rsy =$_POST['rsy'];
$membox=$_POST['chkMem'];
$advbox=$_POST['chkAdv'];
$pos=$_POST['pos'];
$course=$_POST['course'];
$year=$_POST['year'];
$advpos=$_POST['advposition'];
$advservice=$_POST['advservice'];
$advstatus=$_POST['advstatus'];
$advcivil=$_POST['advcivil'];
$sql = "INSERT INTO renewal (org_no, date_renewed, schoolyear) 
	VALUES ('$org','$date','$rsy')";
if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";

					
					
$i = 0;
$j = 0;
mysql_select_db("osa_organization", $conn);
$result2 = mysql_query("SELECT renew_id FROM renewal where org_no='$org' and date_renewed='$date' and schoolyear='$rsy'");
$row2 = mysql_fetch_array($result2);
$renew_id= $row2['renew_id'];


for($i=0; $i < count($membox); $i++)
{if(isset($membox[$i]))
{
$sql = "INSERT INTO member_has_organization VALUES ('".$renew_id."','".$membox[$i]."','".$pos[$i]."','".$course[$i]."','".$year[$i]."')";
if (!mysql_query($sql,$conn))
					{
					echo "Good";
					}
					echo "Adviser's Information successfully added!";
					echo '<a href="renewal.php">Back to Menu</a>';}
}


for($i=0; $i < count($advbox); $i++)
{if(isset($advbox[$i]))
{
$sql = "INSERT INTO organization_has_adviser VALUES ('".$advpos[$i]."','".$advstatus[$i]."','".$advservice[$i]."','".$advcivil[$i]."','".$advbox[$i]."','$renew_id')";
if (!mysql_query($sql,$conn))
					{
					echo "Good";
					}
					echo "Adviser's Information successfully added!";
					echo '<a href="renewal.php">Back to Menu</a>';}
}

?>


