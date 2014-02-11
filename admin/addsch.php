<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_sou", $conn);
	$i=1960;
	$j=$i+1;
	while($j<2051)
	{$sql = "INSERT INTO schoolyears (schyear) VALUES ('".$i."-".$j."')";
	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Adviser's Information successfully added!";
					$i=$i+1;
					$j=$j+1;
	}

	
?>
