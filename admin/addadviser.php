<?php
include_once("header.php");
?>

<h1 style="margin-top:20px;">ADD ADVISER  </h1>

<div id="add">

<form method ="POST" action="addadvisers.php"  enctype="multipart/form-data" name="form1">	 
		
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>Personal Information</h1><hr /> </td>
	
</tr>
<tr><td>School Year</td><td><select name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
   <option value="">---</option>
  <?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT distinct schoolyear FROM renewal");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['schoolyear']?>">
				<?php echo $row['schoolyear']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>  
  <tr><td>Category</td><td><select name="category" id="category" onchange="showOrg(sy.value,category.value)">
  <option value="">---</option>
<?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT * FROM category");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['cat_id']?>">
				<?php echo $row['category_name']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>
 <tr><td>Organization</td><td> 
 <select name="org" id="org" onchange="showMember(sy.value,category.value,org.value)" >
  <option value="" >------</option>
  </select><br />
 </td></tr>

<tr>
	<td>     <label for="br">Last Name</label>	 </td>
	<td>	 <input   type="text" name="lname" id="br" size="30" placeholder=""/></td>
	
</tr>
<tr>
	<td>     <label for="br">First Name</label>	 </td>
	<td>	 <input   type="text" name="fname" id="br" size="30" placeholder=""/></td>
		
</tr>
<tr>
	<td>     <label for="br">Middle Initial</label>	 </td>
	<td>	 <input   type="text" name="miname" id="br" size="30" placeholder=""/></td>	
</tr>
			
<tr>
	<td>		<label for="inputField">Birth Date:</label></td>
	<td>		<input  type="date" name="date" id="inputField"></td>
	
</tr>
<tr>
	<td>		<label for="gend">Gender:</label> </td>			
	<td>		<select name="gender">
	<option selected="selected" value="">-----</option>	
				<option value="Male">Male</option>	
					<option value="Female">Female</option>
					</select>
			</td>
</tr>
<tr>
	<td>	<label for="org">Position :</label> </td>
	<td>  <input   type="text" name="position" id="org" size="30" placeholder=""/> </td>	 
	
</tr>
<tr>
	<td>	<label for="org">Status of Appointment:</label> </td>
	<td>  <select style="font-size:13px; margin-right:225px" name="tenure" id="tenure" class="selecter">
	  <option value="">---</option>
	<option value="Permanent">Permanent</option>
  <option value="Temporary">Temporary</option>
  <option value="Part Time">Part Time</option>
  <option value="Contractual">Contractual</option>
  
      </select> </td>	 
	
</tr>
<tr>
	<td>	<label for="org">Years of Service :</label> </td>
	<td>  <input   type="integer" name="yearsofservice" id="org" size="30" placeholder=""/> </td>	 
	

</tr>
<tr>
	<td>	<label for="org">Civil Status :</label> </td>
	<td>  <select name="civil_status"><option>---</option>
			<option value="Single">Single</option>
			<option value="Married">Married</option>
			</select> </td>
</tr>




	
	
	
	<tr>
	<td colspan="4" style="text-align:center;">	<input  type="submit" name="submit" value ="SAVE">	</td>			
	</tr>
	
	
	
	</table>		
			</form>
</div>

	</div>				
					
					
<div id="footer">
Copyright &copy; 2013
</div>					
<script>
function showOrg(str,str2)
{
if (str==""&&str2=="")
  {
  document.getElementById("org").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("org").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","filterorg.php?q="+str+"&r="+str2,true);
xmlhttp.send();
}
</script>
</body>
</html>
