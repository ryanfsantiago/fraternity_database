<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<?php
	$actid=$_POST['actid'];
	$rid=$_POST['rid'];
	$title=$_POST['title'];
	$venue=$_POST['venue'];
	$clients=$_POST['clients'];
	$abstract=$_POST['abstract'];
	$expense=$_POST['expense'];
	$income=$_POST['income'];
	$datef=$_POST['datef'];
	$datec=$_POST['datec'];	
	$datecom=$_POST['datecom'];
	$act_category=$_POST['act_category'];

	
	$sql = "Update activity set  title='$title', venue='$venue', clientele='$clients', abstract='$abstract', expense='$expense', income='$income', net_income='$income'-'$expense', date_started='$datec', date_completed='$datecom', date_filed='$datef',act_cat_id ='$act_category' where act_no='$actid'";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Acivity Information successfully added!<a href='manageactivities.php'>back</a>";

	mysql_select_db("osa_organization", $conn);
		$result2 = mysql_query("SELECT org_no from renewal where renew_id='$renew_id'");
		$row2 = mysql_fetch_array($result2);
		$org_no = $row2['org_no'];
		
		$result2 = mysql_query("SELECT financial_status from organization where org_no='$org_no'");
		$row2 = mysql_fetch_array($result2);
		$financial_status = $row2['financial_status']+$income;
		$financial_status= $financial_status-$expense;
		
		$sql="update organization set financial_status='".$financial_status."' where org_no='".$org_no."'";
		if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}				
					
					
?>

