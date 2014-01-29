<?php
include_once("header.php");
?>


<?php
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("osa_organization",$conn);
	$id=$_GET['id'];
    $sql= "SELECT organization.*,category.*, renewal.* FROM organization inner join category, renewal WHERE renewal.renew_id= $id and renewal.org_no=organization.org_no and category.cat_id=organization.cat_id";
    $result = mysql_query($sql);
	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }
	
?>

<h1 style="margin-top:20px;">Edit ORGANIZATION  </h1>



<div id="add">
<br />
<form method ="POST" action="editorgs.php"  enctype="multipart/form-data">	 
<input type="hidden" class="form-control" name="orgno" value="<?php echo $row['org_no'];?>">
<input type="hidden" name="renewno" class="form-control" value="<?php echo $row['renew_id'];?>">		
<table cellpadding="3" cellspacing="10">	

<tr>
<td>	<label for="org">School Year :</label> </td>
	<td>  <select name="sy" class="form-control"><option value="<?php echo $row['schoolyear'];?>"><?php echo $row['schoolyear'];?></option>
	
	 <?php 
	 $date = date('Y/m/d h:i:s a', time());
			$result2 = mysql_query("SELECT YEAR('$date') as yr");
			$row2 = mysql_fetch_array($result2);
			$scy = $row2['yr'];
			echo '<option value="',$scy,'-',$scy+1,'">',$scy,'-',$scy+1,'</option>';
  ?></select>
</td>

	</tr>

	<tr><td>	<label for="org">Category :</label> </td>
	<td>  <select name="cat" class="form-control" >
  <option selected="selected" value="<?php echo $row['cat_id']?>"><?php echo $row['category_name']?></option>
<?php
			
			$result2 = mysql_query("SELECT * FROM category");
			
			while($row2 = mysql_fetch_array($result2))
			{ ?>  
              <option value="<?php echo $row2['cat_id']?>">
				<?php echo $row2['category_name']?>
				</option>
		<?php } ?>
  </select>

  
  </td>
</tr>
	</tr>
<tr>
	<td>	<label for="org">Organization Name:</label> </td>
	<td>  <input  class="form-control" type="text" name="orgname" id="org" size="50" placeholder="e.g (Builders of Information Technology Society)" value="<?php echo $row['name']?>"/> 
		</td>	 
	
</tr>



<tr>

	
</tr>			
<tr>
	<td>		<label for="inputField">Date Founded:</label></td>
	<td>		<input  class="form-control" type="date" name="date" id="inputField" value="<?php echo $row['date_estb']?>"></td>
	
</tr>

<tr>
	<td>		<label for="inputField">Date Registered:</label></td>
	<td>		<input class="form-control" type="date" name="rdate" id="inputField" value="<?php echo $row['date_renewed']?>"></td>
	
</tr>
	</tr>
<tr>
<td><label>Objectives</label></td>
<td><textarea name="description" class="form-control"><?php echo $row['description']?></textarea></td>
</tr>
	
	
	<tr>
	<td colspan="2" style="text-align:center;">	<input class="form-control btn-success" type="submit" name="submit" value ="SAVE">	</td>			
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
