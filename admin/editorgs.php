<?php
	$conn = mysql_connect("localhost", "root", "");
    mysql_select_db("osa_organization",$conn);
	    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }
	
	$id=$_POST['orgno'];
	$renewno=$_POST['renewno'];
	$sy=$_POST['sy'];
	$orgname=$_POST['orgname'];
	$description=$_POST['description'];
	$date=$_POST['date'];
	$cat=$_POST['cat'];
	$rdate=$_POST['rdate'];
	
		$sql= "SELECT * FROM organization WHERE org_no = $id";
			$result = mysql_query($sql);
			
			mysql_query("UPDATE organization SET  name =  '$orgname', description =  '$description', date_estb = '$date', cat_id = '$cat' WHERE org_no = $id;");
			
		mysql_select_db("osa_organization", $conn);
	$result = mysql_query("SELECT org_no FROM organization where name='$orgname'");
	$row = mysql_fetch_array($result);;
			$sql = "UPDATE renewal SET  schoolyear =  '$sy', date_renewed =  '$rdate' WHERE org_no = '$id' and renew_id= '$renewno';";
	
	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
			
	
	?>
	
<script>
	document.location="manageorginfo.php";
</script>	