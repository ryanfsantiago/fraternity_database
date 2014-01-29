<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  mysql_select_db("osa_organization", $con);

?>

<?php
include_once("header.php");
?>


  
 

<div id="content">
  <h1 style="text-align:center;"> Manage Organization Information</h1>
  
  
  <table style="width:300px;">	
  <td>Category</td><td><select >
  <option selected="selected" value="">------</option>
	<option  name=" " value="Fraternity/Sorority">Fraternity/Sorority</option>
	<option  name="" value="College-Based">College-Based</option>
	<option  name="" value="Non-College-Based">Non-College-Based</option>
  </select><br />
 </td> </tr>
 
<tr><td><a href="addadviser.php"><input type="button" value=" Add Adviser"></a></td></tr>  
 		</table>			
			  <table border="1" cellpadding="2px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;margin-top:30px;background-color:#E1E1E1;">
	
				<tr>
					
					<td >Organization Name</td>
					
					<td>Year Founded</td>
					<td>Category</td>
					<td><img src="images/icons/edit.png" alt="" /></td>
					<td><img src="images/icons/del.png" alt="" /></td>

					</tr>
			
				<tr>
					
					<?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT * FROM organization");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <tr>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['description']?></td>
				<td><?php echo $row['date_estb']?></td>
				<td><img src="images/icons/edit.png" alt="" title="EDIT" /></td>
				<td><img src="images/icons/del.png" alt="" /></td>
				</td></tr>
		<?php } ?>

					</tr></table>
		

						 
  
  
  
				</div>		
					</div>
<div id="footer">
Copyright &copy; 2013
</div>
</body>
</html>
