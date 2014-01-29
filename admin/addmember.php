<?php
include_once("header.php");
?>





<h1 style="margin-top:20px;">ADD MEMBER  </h1>


<div id="add">

<form method ="POST" action="addmembers.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="5" >	


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
 <select name="org" id="org" onchange="showMember(sy.value,category.value,org.value)">
  <option value="" >------</option>
  </select><br />
 </td></tr>
<tr><td><label>Position in the Organization</label></td><td><input type="text" name="position" id="position"><td></tr>

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
	<td>     <label for="br">Course</label>	 </td>
	<td>	 <input   type="text" name="course" id="br" size="30" placeholder=""/></td>
	

	
</tr>
	
<tr>
	<td>     <label for="br">Year</label>	 </td>
	<td>	 <input   type="text" name="year" id="br" size="30" placeholder=""/></td>
	

	
</tr>
	
<tr>
	<td>		<label for="inputField">Birth Date:</label></td>
	<td>		<input  type="date" name="date" id="inputField"></td>
	
	

	
	
</tr>

<tr>
	<td>		<label for="gend">Gender:</label> </td>			
	<td>		<select name="gender">
				<option value="">---</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
			</td>
</tr>

<tr>
<td colspan="2"><h1>Address Information</h1><hr /> </td>
</tr>

<tr><td>Home Address</td></tr>
	<tr>
	<td>	<label for            ="org">House No./Subdivision/Village/Barangay:</label> </td>
	<td>  <textarea  type         ="text" name="barangay" id="org" size="30" placeholder=""></textarea> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Municipality :</label> </td>
	<td>  <input   type           ="text" name="municipality" id="org" size="30" placeholder=""/> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Province :</label> </td>
	<td>  <input   type           ="text" name="province" id="org" size="30" placeholder=""/> </td>	 
	</tr>
	<tr>
	<td>	 </td>
	<td>  <input type="hidden" value="Home Address" name="adtype"> </td>	 	
</tr>

<tr><td>CLSU Address</td></tr>
	<tr>
	<td>	<label for            ="org">House No./Subdivision/Village/Barangay:</label> </td>
	<td>  <textarea  type         ="text" name="cbarangay" id="org" size="30" placeholder=""></textarea> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Municipality :</label> </td>
	<td>  <input   type           ="text" name="cmunicipality" id="org" size="30" placeholder=""/> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Province :</label> </td>
	<td>  <input   type           ="text" name="cprovince" id="org" size="30" placeholder=""/> </td>	 
	</tr>
	<tr>
	<td>	 </td>
	<td>  <input type="hidden" value="Clsu Address" name="cadtype"> </td>	 	
</tr>



			

<tr>
	<td colspan="4"><h1>Parent's Information</h1><hr /> </td>			
</tr>	
<tr><td><h4>Father</h4></td></tr>
<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="plname" id="br" size="30" placeholder=""/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="pfname" id="br" size="30" placeholder=""/></td>
	</tr>

<tr>
	<td>     	 </td>
	<td>	<input type="hidden" value="father" name="ptype"></td>	
	
	</tr>
	

	
	<tr><td><h4>Mother</h4></td></tr>
<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="mplname" id="br" size="30" placeholder=""/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="mpfname" id="br" size="30" placeholder=""/></td>
	</tr>

<tr>
	<td>      </td>
	<td>	<input type="hidden" value="mother" name="mptype"></td>	
	
	</tr>

<tr><td><h4>Guardian</h4></td></tr>
<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="gplname" id="br" size="30" placeholder=""/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="gpfname" id="br" size="30" placeholder=""/></td>
	</tr>

<tr>
	<td>     	 </td>
	<td>	<input type="hidden" value="guardian" name="gptype"></td>	
	
	</tr>

	
<tr>
	<td colspan="4"><h1>Skill Information</h1><hr /> </td>			
</tr>	
<tr>
	<td>     <label for="br">Skill Name:</label>	 </td>
	<td>	 <textarea   type="text" name="skills" id="br" size="30" /></textarea></td>	

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
