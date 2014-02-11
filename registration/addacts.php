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

	
	$sql = "INSERT INTO activity (renew_id, title, venue, clientele, abstract, expense, income, net_income, date_started, date_completed, date_filed,act_cat_id)
	VALUES ('$renew_id','$title','$venue','$clients','$abstract','$expense','$income','$income'-'$expense','$datec','$datecom','$datef','$act_category')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
	
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
					echo "Adviser's Information successfully added!";
?>

