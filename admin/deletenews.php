<?php
	error_reporting(0);
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("osa_organization", $conn);
    $nid = $_GET['nid'];
	$result = mysql_query("SELECT * FROM news");
	
	while($row=mysql_fetch_array($result)){
		$sql="DELETE FROM news WHERE id='".$nid."'";
		$result=mysql_query($sql);
	}

	?>
	
	<script>document.location = "newslist.php"</script>