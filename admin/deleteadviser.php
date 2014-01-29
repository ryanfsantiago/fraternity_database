<?php

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("osa_organization", $conn);
    $res = $_GET['id'];
	$res2 =$_GET['rid'];
	$result = mysql_query("SELECT * FROM organization_has_adviser");
	
	
	while($row=mysql_fetch_array($result)){
	
	
		$sql="DELETE FROM organization_has_adviser WHERE adviser_id = '$res2' and renew_id='$res'";
		$result=mysql_query($sql);

	}

	?>
	
		<script>document.location = "adviserinfo.php"</script>
