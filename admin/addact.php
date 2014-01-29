<?php
include_once("header.php");
?>




<div class="container">
<h1 style="margin-top:20px">ADD ACTIVITY  </h1>



<div id="add">

<form method ="POST" action="addacts.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>Activity Information</h1><hr /> </td>
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
			
			<tr>
			
			<td>Activity Title </td>
			
			<td><input   type="text" name="title" placeholder="e.g(BITS PAHOTDOG!)" size="30"/></td> 
		</tr>
					<tr>
		<tr><td>Activity Category</td><td> 
 <select name="act_category" id="act_category">
  <option value="" >------</option>
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
			
			
			<td>Venue</td>
			
			<td><input   type="text" name="venue" size="30"/></td> 
		</tr>
		<tr>
	<td> Clientele</td>
	
			<td><input   type="text" name="clients" placeholder="e.g(CLSU Students)" size="30"/> </td>
				
				</tr>
					<tr>
			
			<td>Expense</td>
			
			<td><input   type="text" name="expense" size="30" onkeyup="computeNetIncome(income.value,expense.value)" onkeydown="computeNetIncome(income.value,expense.value)"/></td> 
		</tr>
					<tr>
			
			<td>Income</td>
			
			<td><input   type="text" name="income" size="30" onkeyup="computeNetIncome(income.value,expense.value)" onkeydown="computeNetIncome(income.value,expense.value)"/></td> 
		</tr>
					<tr>
			
			<td>Net Income</td>
			
			<td><input   disabled="disabled" type="text" name="net_income" id="netincome" size="30" value="0"/></td> 
		</tr>	
					<tr>
			
			<td>Abstract<br /></td>
			<td>
			<textarea   type="text" name="abstract" id="br" size="30"></textarea></td>
		</tr>		
		<tr>
		<td>Date Filed</td>
		
			<td><input  type="date" name="datef" id="inputField"> </td> 
		</tr>
		<tr>
		<td>Date Conducted</td>
		
			<td><input  type="date" name="datec" id="inputField"> </td> 
		</tr>			
		<tr>
<td>
Date Completed
</td>		
			<td><input  type="date" name="datecom" id="inputField2" ></td>
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
