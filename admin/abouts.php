<?php
	$conn = mysql_connect("localhost", "root", "");
    mysql_select_db("osa_organization",$conn);
	    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }
	
	$about=$_POST['about'];
	
	
		
	$sql = "Update about set  content='$about' where about_id=1  ";

	if (!mysql_query($sql,$conn))
					{
					die('Error querying database' . mysql_error());
					}
					echo "Acivity Information successfully updated!<a href='about.php'>back</a>";
			
	
	?>
	
