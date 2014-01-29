<?php

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("osa_organization", $conn);
        $res = $_GET['id'];
	$result = mysql_query("SELECT * FROM renewal");
	
	?>
	<?php
	while($row=mysql_fetch_array($result)){
		$sql="DELETE FROM `osa_organization`.`renewal` WHERE `renewal`.`renew_id` = $res";
		$result=mysql_query($sql);
	}

	?>
	
		<script>document.location = "manageorginfo.php"</script>
