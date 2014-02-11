<?php
include_once("header.php");
?>



<div class="container">
	<style>
	input,textarea,select
	{display: block;}
	img
	{border-radius:15px;}
	</style>



	<h1 style="margin-top:20px;">ADD MEMBER  </h1>


<div class="container">

<form method ="POST" runat="server" action="addmembers.php" class="" enctype="multipart/form-data">	 
		



	<h1>Personal Information</h1> 
	

School Year<select name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
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
    
  Category<select name="category" id="category" onchange="showOrg(sy.value,category.value)">
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
  
 Organization 
 <select name="org" id="org" onchange="showMember(sy.value,category.value,org.value)">
  <option value="" >------</option>
  </select><br />
  <img id="blah" src="../admin/photo/default.jpg" alt="your image" width="250px" height="250px"   />
 <input type='file' id="imgInp" name="file" accept="image/*" />
  
<label>Position</label>
	<select name="position" id="position">
<option>----</option>
<option value="1">President</option>
<option value="2">Vice President</option>
<option value="3">Member</option>
	</select>


	     <label for="br">Last Name</label>	 
		 <input   type="text" name="lname" id="br" size="30" placeholder=""/>

	


	     <label for="br">First Name</label>	 
		 <input   type="text" name="fname" id="br" size="30" placeholder=""/>
	
	

	


	     <label for="br">Middle Initial</label>	 
		 <input   type="text" name="miname" id="br" size="30" placeholder=""/>
	

	



	     <label for="br">Course</label>	 
		 <input   type="text" name="course" id="br" size="30" placeholder=""/>
	

	

	

	     <label for="br">Year</label>	 
		 <input   type="text" name="year" id="br" size="30" placeholder=""/>
	

	

	

			<label for="inputField">Birth Date:</label>
			<input  type="date" name="date" id="inputField">
	
	

	
	



			<label for="gend">Gender:</label> 			
			<select name="gender">
				<option value="">---</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
			

<label for="gend">Contact No.:</label><input type="text" name="contact">


<td colspan="2"><h1>Address Information</h1><hr /> 


Home Address
	
		<label for            ="org">House No./Subdivision/Village/Barangay:</label> 
	  <textarea  type         ="text" name="barangay" id="org" size="30" placeholder=""></textarea> 	 
	
	
		<label for            ="org">Municipality :</label> 
	  <input   type           ="text" name="municipality" id="org" size="30" placeholder=""/> 	 
	
	
		<label for            ="org">Province :</label> 
	  <input   type           ="text" name="province" id="org" size="30" placeholder=""/> 	 
	
	
		 
	  <input type="hidden" value="Home Address" name="adtype"> 	 	


CLSU Address
	
		<label for            ="org">House No./Subdivision/Village/Barangay:</label> 
	  <textarea  type         ="text" name="cbarangay" id="org" size="30" placeholder=""></textarea> 	 
	
	
		<label for            ="org">Municipality :</label> 
	  <input   type           ="text" name="cmunicipality" id="org" size="30" placeholder=""/> 	 
	
	
		<label for            ="org">Province :</label> 
	  <input   type           ="text" name="cprovince" id="org" size="30" placeholder=""/> 	 
	
	
		 
	  <input type="hidden" value="Clsu Address" name="cadtype"> 	 	




			


	<td colspan="4"><h1>Parent's Information</h1><hr /> 			
	
<h4>Father</h4>

	     <label for="br">Last Name:</label>	 
		 <input   type="text" name="plname" id="br" size="30" placeholder=""/>	



	     <label for="br">First Name:</label>	 
		 <input   type="text" name="pfname" id="br" size="30" placeholder=""/>
	


	     	 
		<input type="hidden" value="father" name="ptype">	
	
	
	

	
	<h4>Mother</h4>

	     <label for="br">Last Name:</label>	 
		 <input   type="text" name="mplname" id="br" size="30" placeholder=""/>	



	     <label for="br">First Name:</label>	 
		 <input   type="text" name="mpfname" id="br" size="30" placeholder=""/>
	


	      
		<input type="hidden" value="mother" name="mptype">	
	
	

<h4>Guardian</h4>

	     <label for="br">Last Name:</label>	 
		 <input   type="text" name="gplname" id="br" size="30" placeholder=""/>	



	     <label for="br">First Name:</label>	 
		 <input   type="text" name="gpfname" id="br" size="30" placeholder=""/>
	


	     	 
		<input type="hidden" value="guardian" name="gptype">	
	
	

	

	<td colspan="4"><h1>Skill Information</h1><hr /> 			
	

	     <label for="br">Skill Name:</label>	 
		 <textarea   type="text" name="skills" id="br" size="30" /></textarea>	

	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	<td colspan="4" style="text-align:center;">	<input  type="submit" name="submit" value ="SAVE">				
	
	
	
	
			
			</form>
</div>
<div id="footer" style="text-align:center">
Copyright &copy; 2013
</div>					

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
