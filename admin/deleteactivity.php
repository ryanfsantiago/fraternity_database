<?php

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("osa_organization", $conn);
    $res = $_GET['id'];
	
	$result = mysql_query("SELECT * FROM activity");
	
	
	while($row=mysql_fetch_array($result)){
	
	
		$sql="DELETE FROM activity WHERE act_no = '$res'";
		$result=mysql_query($sql);

	}

	?>
	
	<script>document.location = "manageactivities.php"</script>
