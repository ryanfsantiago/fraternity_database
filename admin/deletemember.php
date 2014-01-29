<?php

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("osa_organization", $conn);
    $res = $_GET['id'];
	$res2= $_GET['rid'];
	$result = mysql_query("SELECT * FROM member_has_organization");
	
	while($row=mysql_fetch_array($result)){
		$sql="DELETE FROM member_has_organization WHERE member_id='".$res2."' and renew_id='".$res."'";
		$result=mysql_query($sql);
	}

	?>
	
	<script>document.location = "memberorg.php"</script>