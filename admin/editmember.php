<?php
include_once("header.php");
?>

<?php

 $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("osa_organization",$conn);
	$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$t=$_GET["t"];
    $sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and member.member_id='".$t."'" ;
    $result = mysql_query($sql);
	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }

?>



<h1 style="margin-top:20px;">Edit MEMBER  </h1>


<div id="add">

<form method ="POST" action="editmembers.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="5" >	


	<td colspan="2"><h1>Personal Information</h1><hr /> </td>
	<input type="hidden" name="mid" value="<?php echo $row['member_id']?>">
	<input type="hidden" name="rid" value="<?php echo $row['renew_id']?>">
</tr>
<tr><td>School Year</td><td><select name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
   <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
   
  <?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT distinct schoolyear FROM renewal");
			
			while($row2 = mysql_fetch_array($result2))
			{ ?>  
              <option value="<?php echo $row2['schoolyear']?>">
				<?php echo $row2['schoolyear']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>  
  <tr><td>Category</td><td><select name="category" id="category" onchange="showOrg(sy.value,category.value)">
  <option value="<?php echo $row['cat_id']?>"><?php echo $row['category_name']?></option>
<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * FROM category");
			
			while($row2 = mysql_fetch_array($result2))
			{ ?>  
              <option value="<?php echo $row2['cat_id']?>">
				<?php echo $row2['category_name']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>
 <tr><td>Organization</td><td> 
 <select name="org" id="org" onchange="showMember(sy.value,category.value,org.value)">
  <option value="<?php echo $row['renew_id']?>" ><?php echo $row['name']?></option>
  </select><br />
 </td></tr>
<tr><td><label>Position in the Organization</label></td><td><input type="text" name="position" id="position" value="<?php echo $row['position']?>"><td></tr>

<tr>
	<td>     <label for="br">Last Name</label>	 </td>
	<td>	 <input   type="text" name="lname" id="br" size="30" placeholder="" value="<?php echo $row['lastname']?>"/></td>

	
</tr>
<tr>
	<td>     <label for="br">First Name</label>	 </td>
	<td>	 <input   type="text" name="fname" id="br" size="30" placeholder=""value="<?php echo $row['firstname']?>"/></td>
	
	

	
</tr>
<tr>
	<td>     <label for="br">Middle Initial</label>	 </td>
	<td>	 <input   type="text" name="miname" id="br" size="30" placeholder="" value="<?php echo $row['mi']?>"/></td>
	

	
</tr>

<tr>
	<td>     <label for="br">Course</label>	 </td>
	<td>	 <input   type="text" name="course" id="br" size="30" placeholder="" value="<?php echo $row['course']?>"/></td>
	

	
</tr>
	
<tr>
	<td>     <label for="br">Year</label>	 </td>
	<td>	 <input   type="text" name="year" id="br" size="30" placeholder="" value="<?php echo $row['year']?>"/></td>
	

	
</tr>
	
<tr>
	<td>		<label for="inputField">Birth Date:</label></td>
	<td>		<input  type="date" name="date" id="inputField" value="<?php echo $row['bdate']?>"></td>
	
	

	
	
</tr>

<tr>
	<td>		<label for="gend">Gender:</label> </td>			
	<td>		<select name="gender">
				<option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
			</td>
</tr>

<tr>
<td colspan="2"><h1>Address Information</h1><hr /> </td>
</tr>
		<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Home address' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  
            
<tr><td>Home Address</td></tr>
	<tr>
	<td>	<label for            ="org">House No./Subdivision/Village/Barangay:</label> </td>
	<td>  <textarea  type         ="text" name="barangay" id="org" size="30" placeholder=""><?php echo $row2['brgy']?></textarea> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Municipality :</label> </td>
	<td>  <input   type           ="text" name="municipality" id="org" size="30" placeholder="" value="<?php echo $row2['municipality']?>"/> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Province :</label> </td>
	<td>  <input   type           ="text" name="province" id="org" size="30" placeholder="" value="<?php echo $row2['province']?>"/> </td>	 
	</tr>
	<tr>
	<td>	 </td>
	<td>  <input type="hidden" value="Home Address" name="adtype"> </td>	 	
</tr>

<tr><td>CLSU Address</td></tr>
	<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Clsu Address' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  

	<tr>
	<td>	<label for            ="org">House No./Subdivision/Village/Barangay:</label> </td>
	<td>  <textarea  type    ="text" name="cbarangay" id="org" size="30" placeholder=""><?php echo $row2['brgy']?></textarea> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Municipality :</label> </td>
	<td>  <input   type      ="text" name="cmunicipality" id="org" size="30" placeholder="" value="<?php echo $row2['municipality']?>"/> </td>	 
	</tr>
	<tr>
	<td>	<label for            ="org">Province :</label> </td>
	<td>  <input   type    ="text" name="cprovince" id="org" size="30" placeholder="" value="<?php echo $row2['province']?>"/> </td>	 
	</tr>
	<tr>
	<td>	 </td>
	<td>  <input type="hidden" value="Clsu Address" name="cadtype"> </td>	 	
</tr>



			

<tr>
	<td colspan="4"><h1>Parent's Information</h1><hr /> </td>			
</tr>	
<tr><td><h4>Father</h4></td></tr>

<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'father' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  

<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="plname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="pfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/></td>
	</tr>

<tr>
	<td>     	 </td>
	<td>	<input type="hidden" value="father" name="ptype"></td>	
	
	</tr>
	

	
	<tr><td><h4>Mother</h4></td></tr>
	<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'mother' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  
	
	
<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="mplname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="mpfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/></td>
	</tr>

<tr>
	<td>      </td>
	<td>	<input type="hidden" value="mother" name="mptype"></td>	
	
	</tr>

<tr><td><h4>Guardian</h4></td></tr>

<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'guardian' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  

<tr>
	<td>     <label for="br">Last Name:</label>	 </td>
	<td>	 <input   type="text" name="gplname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/></td>	

</tr>
<tr>
	<td>     <label for="br">First Name:</label>	 </td>
	<td>	 <input   type="text" name="gpfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/></td>
	</tr>

<tr>
	<td>     	 </td>
	<td>	<input type="hidden" value="guardian" name="gptype"></td>	
	
	</tr>

	
<tr>
	<td colspan="4"><h1>Skill Information</h1><hr /> </td>			
</tr>	
<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from skill where member_id = '".$t."'");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  
<tr>
	<td>     <label for="br">Skill Name:</label>	 </td>
	<td>	 <textarea   type="text" name="skills" id="br" size="30" /><?php echo $row2['type']?></textarea></td>	

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
