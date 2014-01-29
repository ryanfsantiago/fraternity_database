<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<?php
	$nid = $_POST['nid'];
	$title=$_POST['title'];
	$body=$_POST['body'];
	$date=$_POST['date'];
	

	
	$sql = "Update news set  title='$title',body='$body',date='$date' where id='$nid'  ";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Acivity Information successfully updated!<a href='newslist.php'>back</a>";

	
					
					
?>

