<?php
include_once("header.php");
?>




<div class="container">
<h1 style="margin-top:20px">Edit News  </h1>



<?php
$conn = mysql_connect("localhost", "root", "");
    mysql_select_db("osa_organization",$conn);
$nid = $_GET['nid'];
$sql = "SELECT * from news where id='".$nid."'";
$result = mysql_query($sql);
	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }
?>

<form method ="POST" action="editnewss.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>News Information</h1><hr /> </td>
</tr>
<tr>
			
			<td>Activity Title </td>
			<input type="hidden" name="nid" value="<?php echo $row['id']?>">
			<td><input   type="text" name="title" value="<?php echo $row['title']?>" placeholder="Mr. aand Ms. CLSU" size="30"/></td> 
		</tr>
					<tr>
		<tr><td>Body</td><td> 
 		<textarea name="body"><?php echo $row['body']?></textarea>
 </td></tr>
		<tr>
<td>
Date:
</td>		
			<td><input  type="date" name="date" id="inputField2" value="<?php echo $row['date']?>" ></td>
</tr>


				
				
	<tr>
	<td colspan="4" style="text-align:center;">	<input  type="submit" name="submit" class="btn btn-success" value ="SAVE">	</td>			
	</tr>
	
	
	
	</table>		
			</form>
</div>

</div>			
					
				
<div id="footer">
Copyright &copy; 2013
</div>					
</body>
</html>
