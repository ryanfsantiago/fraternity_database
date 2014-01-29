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
$sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id and adviser.adviser_id='".$t."'" ;
    $result = mysql_query($sql);
	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }

?>



<h1 style="margin-top:20px;">Edit ADVISER  </h1>

<div id="add">

<form method ="POST" action="editadvisers.php"  enctype="multipart/form-data" name="form1">	 
		
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>Personal Information</h1><hr /> </td>
	<input type="hidden" name="aid" value="<?php echo $row['adviser_id']?>">
	<input type="hidden" name="rid" value="<?php echo $row['renew_id']?>">
</tr>
<tr><td>School Year</td><td><select name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
   <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
  <?php
			mysql_select_db("osa_organization", $con);
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
			mysql_select_db("osa_organization", $con);
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
 <select name="org" id="org" onchange="showMember(sy.value,category.value,org.value)" >
  <option value="<?php echo $row['renew_id']?>" ><?php echo $row['name']?></option>
  </select><br />
 </td></tr>

<tr>
	<td>     <label for="br">Last Name</label>	 </td>
	<td>	 <input   type="text" name="lname" id="br" size="30" value="<?php echo $row['lastname']?>"/></td>
	
</tr>
<tr>
	<td>     <label for="br">First Name</label>	 </td>
	<td>	 <input   type="text" name="fname" id="br" size="30" value="<?php echo $row['firstname']?>"/></td>
		
</tr>
<tr>
	<td>     <label for="br">Middle Initial</label>	 </td>
	<td>	 <input   type="text" name="miname" id="br" size="30" value="<?php echo $row['mi']?>"/></td>	
</tr>
			
<tr>
	<td>		<label for="inputField">Birth Date:</label></td>
	<td>		<input  type="date" name="date" id="inputField" value="<?php echo $row['bdate']?>"></td>
	
</tr>
<tr>
	<td>		<label for="gend">Gender:</label> </td>			
	<td>		<select name="gender">
	<option selected="selected" value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>	
				<option value="Male">Male</option>	
					<option value="Female">Female</option>
					</select>
			</td>
</tr>
<tr>
	<td>	<label for="org">Position :</label> </td>
	<td>  <input   type="text" name="position" id="org" size="30" value="<?php echo $row['position']?>"/> </td>	 
	
</tr>
<tr>
	<td>	<label for="org">Status of Appointment:</label> </td>
	<td>  <select style="font-size:13px; margin-right:225px" name="tenure" id="tenure" class="selecter">
	  <option value="<?php echo $row['status_of_appointment']?>"><?php echo $row['status_of_appointment']?></option>
	<option value="Permanent">Permanent</option>
  <option value="Temporary">Temporary</option>
  <option value="Part Time">Part Time</option>
  <option value="Contractual">Contractual</option>
  
      </select> </td>	 
	
</tr>
<tr>
	<td>	<label for="org">Years of Service :</label> </td>
	<td>  <input   type="integer" name="yearsofservice" id="org" size="30" value="<?php echo $row['years_of_service']?>"/> </td>	 
	

</tr>
<tr>
	<td>	<label for="org">Civil Status :</label> </td>
	<td>  <select name="civil_status"><option value="<?php echo $row['civil_status']?>"><?php echo $row['civil_status']?></option>
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
