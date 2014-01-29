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
$sql="SELECT organization.*,category.*,renewal.*,activity.* FROM organization inner join category,renewal,activity WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id and activity.act_no='".$t."'" ;
    $result = mysql_query($sql);
	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }

?>


<h1 style="margin-top:20px;">EDIT ACTIVITY  </h1>



<div id="add">

<form method ="POST" action="editacts.php"  enctype="multipart/form-data" onload="computeNetIncome(income.value,expense.value)">	 
		<input type="hidden" name="actid" value="<?php echo $row['act_no']?>">
		<input type="hidden" name="rid" value="<?php echo $row['renew_id']?>">
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>Activity Information</h1><hr /> </td>
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
			
			<tr>
			
			<td>Activity Title </td>
			
			<td><input   type="text" name="title" value="<?php echo $row['title']?>" size="30"/></td> 
		</tr>
		
				<tr><td>Activity Category</td><td> 
 <select name="act_category" id="act_category">
  <option value="0" >------</option>
<?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT * FROM activity_has_category");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['id']?>">
				<?php echo $row['name']?>
				</option>
		<?php } ?>
  </select><br />
 </td></tr>
					<tr>
			
			<td>Venue</td>
			
			<td><input   type="text" name="venue" size="30" value="<?php echo $row['venue']?>"/></td> 
		</tr>
		<tr>
	<td> Clientele</td>
	
			<td><input   type="text" name="clients" value="<?php echo $row['clientele']?>" size="30"/> </td>
				
				</tr>
					<tr>
			
			<td>Expense</td>
			
			<td><input   type="text" name="expense" size="30" value="<?php echo $row['expense']?>" onkeyup="computeNetIncome(income.value,expense.value)" onkeydown="computeNetIncome(income.value,expense.value)"/></td> 
		</tr>
					<tr>
			
			<td>Income</td>
			
			<td><input   type="text" name="income" value="<?php echo $row['income']?>" size="30" onkeyup="computeNetIncome(income.value,expense.value)" onkeydown="computeNetIncome(income.value,expense.value)"/></td> 
		</tr>
					<tr>
			
			<td>Net Income</td>
			
			<td><input   disabled="disabled" type="text" name="net_income" value="<?php echo $row['net_income']?>" id="netincome" size="30" value="0"/></td> 
		</tr>	
					<tr>
			
			<td>Abstract<br /></td>
			<td>
			<textarea   type="text" name="abstract" id="br" size="30"><?php echo $row['abstract']?></textarea></td>
		</tr>		
		<tr>
		<td>Date Filed</td>
		
			<td><input  type="date" name="datef" id="inputField" value="<?php echo $row['date_filed']?>"> </td> 
		</tr>
		<tr>
		<td>Date Conducted</td>
		
			<td><input  type="date" name="datec" id="inputField" value="<?php echo $row['date_started']?>"> </td> 
		</tr>			
		<tr>
<td>
Date Completed
</td>		
			<td><input  type="date" name="datecom" id="inputField2" value="<?php echo $row['date_completed']?>" ></td>
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

function computeNetIncome(inc,exp)
{
var netinc=inc-exp;
document.getElementById('netincome').value= netinc;
}
</script>
</body>
</html>
