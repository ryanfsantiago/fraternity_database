<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<?php
	$title=$_POST['title'];
	$body=$_POST['body'];
	$date=$_POST['date'];
	

	
	$sql = "INSERT INTO news (title,body,date) values ('$title','$body','$date')";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
	?>				
	


