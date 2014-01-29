<?php
include_once("header.php");
?>




<h1 style="margin-top:20px;">ADD ORGANIZATION  </h1>



<div id="add" class="container">
<br />
<form method ="POST" action="addorgs.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="10">	

<tr>
<td>	<label for="org">School Year :</label> </td>
	<td>  <select name="sy" class="form-control"><option>---</option>
	 <?php 
	 $date = date('Y/m/d h:i:s a', time());
	 mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT YEAR('$date') as yr");
			$row = mysql_fetch_array($result);
			$scy = $row['yr'];
			echo '<option value="',$scy,'-',$scy+1,'">',$scy,'-',$scy+1,'</option>';
  ?></select>
</td>

	</tr>

	<tr><td>	<label for="org">Category :</label> </td>
	<td>  <select name="cat" class="form-control" >
  <option selected="selected" value="">------</option>
<?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT * FROM category");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['cat_id']?>">
				<?php echo $row['category_name']?>
				</option>
		<?php } ?>
  </select>

  
  </td>
</tr>
	</tr>
<tr>
	<td>	<label for="org">Organization Name:</label> </td>
	<td>  <input class="form-control" class="form-control"  type="text" name="orgname" id="org" size="50" placeholder="e.g (Builders of Information Technology Society)"/> 
		</td>	 
	
</tr>



<tr>

	
</tr>			
<tr>
	<td>		<label for="inputField">Date Founded:</label></td>
	<td>		<input class="form-control"  type="date" name="date" id="inputField"></td>
	
</tr>

<tr>
	<td>		<label for="inputField">Date Registered:</label></td>
	<td>		<input class="form-control"  type="date" name="rdate" id="inputField"></td>
	
</tr>
	</tr>
<tr>
<td><label>Objectives</label></td>
<td><textarea class="form-control" name="description"></textarea></td>
</tr>
	
	
	<tr>
	<td colspan="2" style="text-align:center;">	<input class="form-control btn-success"  type="submit" name="submit" value ="SAVE">	</td>			
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
