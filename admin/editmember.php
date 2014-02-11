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


<div class="container">
	<style>
	input,textarea,select
	{display: block;}
	img
	{border-radius:15px;}
	</style>


<form method ="POST" action="editmembers.php"  enctype="multipart/form-data" role="form">	 
		


	<td colspan="2"><h1>Personal Information</h1><hr /> 
	<input size="60" class="form-control" type="hidden" name="mid" value="<?php echo $row['member_id']?>">
	<input size="60" class="form-control" type="hidden" name="rid" value="<?php echo $row['renew_id']?>">

<div class="form-group">
<label>School Year</label><select class="form-control" name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
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
    </div>
  Category<select class="form-control" name="category" id="category" onchange="showOrg(sy.value,category.value)">
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
  
 Organization 
 <select class="form-control" name="org" id="org" onchange="showMember(sy.value,category.value,org.value)">
  <option value="<?php echo $row['renew_id']?>" ><?php echo $row['name']?></option>
  </select><br />
 <br>
 <img id="blah" src="photo/default.jpg" alt="your image" width="250px" height="250px"   />
 <input size="60"  type='file' id="imgInp" name="file" accept="image/*" />
<label>Position in the Organization</label>

<select class="form-control" name="position">
	<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from position where pos_id=".$row['pos_id']."");
			$row2 = mysql_fetch_array($result2);
			 ?>  
<option value="<?php echo $row['pos_id']?>"><?php echo $row2['pos_name']?></option>
<option value="1">President</option>
<option value="2">Vice President</option>
<option value="3">Member</option>
</select>




	     <label for="br">Last Name</label>	 
		 <input size="60" class="form-control"   type="text" name="lname" id="br" size="30" placeholder="" value="<?php echo $row['lastname']?>"/>

	


	     <label for="br">First Name</label>	 
		 <input size="60" class="form-control"   type="text" name="fname" id="br" size="30" placeholder=""value="<?php echo $row['firstname']?>"/>
	
	

	


	     <label for="br">Middle Initial</label>	 
		 <input size="60" class="form-control"   type="text" name="miname" id="br" size="30" placeholder="" value="<?php echo $row['mi']?>"/>
	

	



	     <label for="br">Course</label>	 
		 <input size="60" class="form-control"   type="text" name="course" id="br" size="30" placeholder="" value="<?php echo $row['course']?>"/>
	

	

	

	     <label for="br">Year</label>	 
		 <input size="60" class="form-control"   type="text" name="year" id="br" size="30" placeholder="" value="<?php echo $row['year']?>"/>
	

	

	

			<label for="inputField">Birth Date:</label>
			<input size="60" class="form-control"  type="date" name="date" id="inputField" value="<?php echo $row['bdate']?>">
	
	

	
	



			<label for="gend">Gender:</label> 			
			<select class="form-control" name="gender">
				<option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
			


<label for="gend">Contact No.:</label><input size="60" class="form-control" type="text" name="contact" value="<?php echo $row['contact_no']?>">

<td colspan="2"><h1>Address Information</h1><hr /> 

		<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Home address' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  
            
Home Address
	
		<label for            ="org">House No./Subdivision/Village/Barangay:</label> 
	  <textarea class="form-control"  type         ="text" name="barangay" id="org" size="30" placeholder=""><?php echo $row2['brgy']?></textarea> 	 
	
	
		<label for            ="org">Municipality :</label> 
	  <input size="60" class="form-control"   type           ="text" name="municipality" id="org" size="30" placeholder="" value="<?php echo $row2['municipality']?>"/> 	 
	
	
		<label for            ="org">Province :</label> 
	  <input size="60" class="form-control"   type           ="text" name="province" id="org" size="30" placeholder="" value="<?php echo $row2['province']?>"/> 	 
	
	
		 
	  <input size="60" class="form-control" type="hidden" value="Home Address" name="adtype"> 	 	


CLSU Address
	<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Clsu Address' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  

	
		<label for            ="org">House No./Subdivision/Village/Barangay:</label> 
	  <textarea class="form-control"  type    ="text" name="cbarangay" id="org" size="30" placeholder=""><?php echo $row2['brgy']?></textarea> 	 
	
	
		<label for            ="org">Municipality :</label> 
	  <input size="60" class="form-control"   type      ="text" name="cmunicipality" id="org" size="30" placeholder="" value="<?php echo $row2['municipality']?>"/> 	 
	
	
		<label for            ="org">Province :</label> 
	  <input size="60" class="form-control"   type    ="text" name="cprovince" id="org" size="30" placeholder="" value="<?php echo $row2['province']?>"/> 	 
	
	
		 
	  <input size="60" class="form-control" type="hidden" value="Clsu Address" name="cadtype"> 	 	




			


	<td colspan="4"><h1>Parent's Information</h1><hr /> 			
	
<h4>Father</h4>

<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'father' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  


	     <label for="br">Last Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="plname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/>	



	     <label for="br">First Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="pfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/>
	


	     	 
		<input size="60" class="form-control" type="hidden" value="father" name="ptype">	
	
	
	

	
	<h4>Mother</h4>
	<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'mother' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  
	
	

	     <label for="br">Last Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="mplname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/>	



	     <label for="br">First Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="mpfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/>
	


	      
		<input size="60" class="form-control" type="hidden" value="mother" name="mptype">	
	
	

<h4>Guardian</h4>

<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'guardian' ");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  


	     <label for="br">Last Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="gplname" id="br" size="30" placeholder="" value="<?php echo $row2['lastname']?>"/>	



	     <label for="br">First Name:</label>	 
		 <input size="60" class="form-control"   type="text" name="gpfname" id="br" size="30" placeholder="" value="<?php echo $row2['firstname']?>"/>
	


	     	 
		<input size="60" class="form-control" type="hidden" value="guardian" name="gptype">	
	
	

	

	<td colspan="4"><h1>Skill Information</h1><hr /> 			
	
<?php
			mysql_select_db("osa_organization", $conn);
			$result2 = mysql_query("SELECT * from skill where member_id = '".$t."'");
			
			$row2 = mysql_fetch_array($result2);
			 ?>  

	     <label for="br">Skill Name:</label>	 
		 <textarea class="form-control"   type="text" name="skills" id="br" size="30" /><?php echo $row2['type']?></textarea>	
	<br>
		<input size="60" class="form-control btn-success"  type="submit" name="submit" value ="SAVE">				
			</form>
</div>

	</div>				
					
					
<div id="footer">
Copyright &copy; 2013
</div>	
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

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
